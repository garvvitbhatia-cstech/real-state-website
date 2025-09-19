<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Awards;
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

class AwardsController extends Controller
{
	private static $Awards;
    private static $TokenHelper;
	public function __construct(){
		self::$Awards = new Awards();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/awards/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Awards->where('status', '!=', 3);

		if($request->input('name')  && $request->input('name') != ""){
            $name = $request->input('name');
            $query->where('name', 'like', '%'.$name.'%');
		}
		if($request->input('designation')  && $request->input('designation') != ""){
            $designation = $request->input('designation');
            $query->where('designation', 'like', '%'.$designation.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/awards/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'heading' => 'required',
            ],[
				'heading.required' => 'Please enter heading.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('heading')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('heading')));die;
				}
			}else{
				$setData['heading'] = $request->input('heading'); 
				$setData['sub_heading'] = $request->input('sub_heading');
				
				if(isset($request->icon) && $request->icon->extension() != ""){
					$validator = Validator::make($request->all(), [
						'icon' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('icon')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('icon')).'.'.$request->icon->extension());
						$destination = base_path().'/public/img/categories/';
						$request->icon->move($destination, $actual_image_name);
						$setData['icon'] = $actual_image_name;
					}
				}				
				$record = self::$Awards->CreateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Brand added successfully'));die;
			}
		}
		return view('/admin/awards/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'heading' => 'required',
            ],[
				'heading.required' => 'Please enter heading.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('heading')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('heading')));die;
				}
			}else{
                //profile
				$setData['id'] =  $RowID;
				$setData['heading'] = $request->input('heading'); 
				$setData['sub_heading'] = $request->input('sub_heading');

				if(isset($request->icon) && $request->icon->extension() != ""){
					$validator = Validator::make($request->all(), [
						'icon' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('icon')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('icon')).'.'.$request->icon->extension());
						$destination = base_path().'/public/img/categories/';
						$request->icon->move($destination, $actual_image_name);
						$setData['icon'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$request->input('old_image'))){
								unlink($destination.$request->input('old_image'));
							}
						}
					}
				}
				self::$Awards->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Brand updated successfully'));die;
			}
		}
		$rowData = self::$Awards->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/awards/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/awards');
        }
    }
	
	
}