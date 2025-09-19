<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\Responses;
use ReallySimpleJWT\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Languages;
use Session;
use Validator;
use Mail;
use URL;
use Cookie;
use Illuminate\Validation\Rule;

class TestimonialsController extends Controller
{
	private static $Testimonials;
    private static $TokenHelper;
	public function __construct(){
		self::$Testimonials = new Testimonials();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/testimonials/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Testimonials->where('status', '!=', 3);

		if($request->input('status')  && $request->input('status') != ""){
            $status = $request->input('status');
            $query->where('status', $status);
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/testimonials/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'url' => 'required',
            ],[
				'title.required' => 'Please enter name.',
				'url.required' => 'Please enter youtube URL.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
				if($errors->first('url')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('url')));die;
				}
			}else{
				$setData['name'] = $request->input('name');
				$setData['url'] = $request->input('url');
				$setData['testimonial'] = $request->input('description');
				
				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|image|mimes:jpeg,png,jpg'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
						$destination = base_path().'/public/img/testimonials/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
					}
				}				
				$record = self::$Testimonials->CreateRecord($setData);
                
                echo json_encode(array('heading'=>'Success','msg'=>'Testimonial added successfully'));die;
			}
		}
		return view('/admin/testimonials/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'url' => 'required',
            ],[
				'title.required' => 'Please enter name.',
				'url.required' => 'Please enter youtube URL.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
				if($errors->first('url')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('url')));die;
				}
			}else{
				$setData['id'] =  $RowID;
				$setData['name'] = $request->input('name');
				$setData['url'] = $request->input('url');
				$setData['testimonial'] = $request->input('description');
				
				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|image|mimes:jpeg,png,jpg'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
						$destination = base_path().'/public/img/testimonials/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$request->input('old_image'))){
								unlink($destination.$request->input('old_image'));
							}
						}
					}
				}
				self::$Testimonials->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Testimonial updated successfully'));die;
			}
		}
		$rowData = self::$Testimonials->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/testimonials/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/categories');
        }
    }

}