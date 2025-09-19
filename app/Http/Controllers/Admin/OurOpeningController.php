<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OurOpening;
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

class OurOpeningController extends Controller
{
	private static $OurOpening;
    private static $TokenHelper;
	public function __construct(){
		self::$OurOpening = new OurOpening();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/our_opening/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$OurOpening->where('status', '!=', 3);

		if($request->input('name')  && $request->input('name') != ""){
            $name = $request->input('name');
            $query->where('name', 'like', '%'.$name.'%');
		}
		if($request->input('designation')  && $request->input('designation') != ""){
            $designation = $request->input('designation');
            $query->where('designation', 'like', '%'.$designation.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/our_opening/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'category' => 'required',
				'heading' => 'required',
            ],[
				'category.required' => 'Please enter category.',
				'heading.required' => 'Please enter heading.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('category')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('category')));die;
				}
				if($errors->first('heading')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('heading')));die;
				}
			}else{
				$setData['category'] = $request->input('category'); 
				$setData['heading'] = $request->input('heading');
				$setData['description'] = $request->input('description');
				
				if(isset($request->banner) && $request->banner->extension() != ""){
					$validator = Validator::make($request->all(), [
						'banner' => 'required|image|mimes:jpeg,png,jpg|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('banner')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('banner')).'.'.$request->banner->extension());
						$destination = base_path().'/public/img/categories/';
						$request->banner->move($destination, $actual_image_name);
						$setData['banner'] = $actual_image_name;
					}
				}				
				$record = self::$OurOpening->CreateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'OurOpening added successfully'));die;
			}
		}
		return view('/admin/our_opening/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'category' => 'required',
				'heading' => 'required',
            ],[
				'category.required' => 'Please enter category.',
				'heading.required' => 'Please enter heading.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('category')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('category')));die;
				}
				if($errors->first('heading')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('heading')));die;
				}
			}else{
                //profile
				$setData['id'] =  $RowID;
				$setData['category'] = $request->input('category'); 
				$setData['heading'] = $request->input('heading');
				$setData['description'] = $request->input('description');

				if(isset($request->banner) && $request->banner->extension() != ""){
					$validator = Validator::make($request->all(), [
						'banner' => 'required|image|mimes:jpeg,png,jpg|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('banner')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('banner')).'.'.$request->banner->extension());
						$destination = base_path().'/public/img/categories/';
						$request->banner->move($destination, $actual_image_name);
						$setData['banner'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$request->input('old_image'))){
								unlink($destination.$request->input('old_image'));
							}
						}
					}
				}
				self::$OurOpening->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'OurOpening updated successfully'));die;
			}
		}
		$rowData = self::$OurOpening->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/our_opening/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/our-team');
        }
    }
	
	
}