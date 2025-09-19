<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
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

class CategoriesController extends Controller
{
	private static $Category;
    private static $TokenHelper;
	public function __construct(){
		self::$Category = new Category();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/categories/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Category->where('status', '!=', 3);

		if($request->input('title')  && $request->input('title') != ""){
            $title = $request->input('title');
            $query->where('title', 'like', '%'.$title.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/categories/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'title' => 'required|unique:categories,title',
            ],[
				'title.required' => 'Please enter email.',
				'title.unique' => 'Title already exists.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
                if(!self::$Category->ExistingRecord($request->input('title'))){
                    $setData['title'] = $request->input('title');
					$setData['slug'] = Str::slug($request->input('title'));
					$setData['description'] = $request->input('description');
					$setData['seo_title'] = $request->input('seo_title');
					$setData['seo_description'] = $request->input('seo_description');
					$setData['seo_keyword'] = $request->input('seo_keyword');
					$setData['robot_tags'] = $request->input('robot_tags');
					
					if(isset($request->image) && $request->image->extension() != ""){
                        $validator = Validator::make($request->all(), [
                            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                        ]);
                        if($validator->fails()){
                            $errors = $validator->errors();
                            return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
                        }else{
							$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
                            $destination = base_path().'/public/img/categories/';
                            $request->image->move($destination, $actual_image_name);
                            $setData['image'] = $actual_image_name;
                        }
                    }
					
                    $record = self::$Category->CreateRecord($setData);
                }
                echo json_encode(array('heading'=>'Success','msg'=>'Category added successfully'));die;
			}
		}
		return view('/admin/categories/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'title' => 'required|unique:categories,title,'.$RowID,
            ],[
				'title.required' => 'Please enter title.',		
				'title.unique' => 'Title already exists.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
                //profile image
                if(self::$Category->ExistingRecordUpdate($request->input('email'), $RowID)){
                    echo json_encode(array('heading'=>'Error','msg'=>'Customer already exists.'));die;
                }else{
                    $setData['id'] =  $RowID;
                    $setData['title'] = $request->input('title');
					$setData['slug'] = Str::slug($request->input('title'));
					$setData['description'] = $request->input('description');
					$setData['seo_title'] = $request->input('seo_title');
					$setData['seo_description'] = $request->input('seo_description');
					$setData['seo_keyword'] = $request->input('seo_keyword');
					$setData['robot_tags'] = $request->input('robot_tags');

                    if(isset($request->image) && $request->image->extension() != ""){
                        $validator = Validator::make($request->all(), [
                            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
                        ]);
                        if($validator->fails()){
                            $errors = $validator->errors();
                            return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
                        }else{
							$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
                            $destination = base_path().'/public/img/categories/';
                            $request->image->move($destination, $actual_image_name);
                            $setData['image'] = $actual_image_name;
                            if($request->input('old_image') != ""){
                                if(file_exists($destination.$request->input('old_image'))){
                                    unlink($destination.$request->input('old_image'));
                                }
                            }
                        }
                    }
                    self::$Category->UpdateRecord($setData);
                }
                echo json_encode(array('heading'=>'Success','msg'=>'Category updated successfully'));die;
			}
		}
		$rowData = self::$Category->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/categories/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/categories');
        }
    }
}