<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OurTeam;
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

class OurTeamController extends Controller
{
	private static $OurTeam;
    private static $TokenHelper;
	public function __construct(){
		self::$OurTeam = new OurTeam();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/ourteam/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$OurTeam->where('status', '!=', 3);

		if($request->input('name')  && $request->input('name') != ""){
            $name = $request->input('name');
            $query->where('name', 'like', '%'.$name.'%');
		}
		if($request->input('designation')  && $request->input('designation') != ""){
            $designation = $request->input('designation');
            $query->where('designation', 'like', '%'.$designation.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/ourteam/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'designation' => 'required',
            ],[
				'title.required' => 'Please enter name.',
				'designation.required' => 'Please enter designation.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('name')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('name')));die;
				}
				if($errors->first('designation')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('designation')));die;
				}
			}else{
				$setData['name'] = $request->input('name'); 
				$setData['designation'] = $request->input('designation');
				$setData['description'] = $request->input('description');
				
				if(isset($request->profile) && $request->profile->extension() != ""){
					$validator = Validator::make($request->all(), [
						'profile' => 'required|image|mimes:jpeg,png,jpg|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('profile')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('profile')).'.'.$request->profile->extension());
						$destination = base_path().'/public/img/categories/';
						$request->profile->move($destination, $actual_image_name);
						$setData['profile'] = $actual_image_name;
					}
				}				
				$record = self::$OurTeam->CreateRecord($setData);
                
                echo json_encode(array('heading'=>'Success','msg'=>'OurTeam added successfully'));die;
			}
		}
		return view('/admin/ourteam/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'designation' => 'required',
            ],[
				'title.required' => 'Please enter name.',
				'designation.required' => 'Please enter designation.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('name')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('name')));die;
				}
				if($errors->first('designation')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('designation')));die;
				}
			}else{
                //profile
				$setData['id'] =  $RowID;
				$setData['name'] = $request->input('name'); 
				$setData['designation'] = $request->input('designation');
				$setData['description'] = $request->input('description');

				if(isset($request->profile) && $request->profile->extension() != ""){
					$validator = Validator::make($request->all(), [
						'profile' => 'required|image|mimes:jpeg,png,jpg|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('profile')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('profile')).'.'.$request->profile->extension());
						$destination = base_path().'/public/img/categories/';
						$request->profile->move($destination, $actual_image_name);
						$setData['profile'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$request->input('old_image'))){
								unlink($destination.$request->input('old_image'));
							}
						}
					}
				}
				self::$OurTeam->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'OurTeam updated successfully'));die;
			}
		}
		$rowData = self::$OurTeam->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/ourteam/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/our-team');
        }
    }
	
	
}