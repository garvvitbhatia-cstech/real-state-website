<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\EventImages;
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

class BlogsController extends Controller
{
	private static $Blogs;
	private static $Banners;
    private static $TokenHelper;
	public function __construct(){
		self::$Blogs = new Blogs();
		self::$Banners = new EventImages();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/blogs/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Blogs->where('status', '!=', 3);

		if($request->input('title')  && $request->input('title') != ""){
            $title = $request->input('title');
            $query->where('title', 'like', '%'.$title.'%');
		}
		if($request->input('tags')  && $request->input('tags') != ""){
            $tags = $request->input('tags');
            $query->where('tags', 'like', '%'.$tags.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/blogs/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'description' => 'required',
            ],[
				'title.required' => 'Please enter title.',
				'description.required' => 'Please enter description.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
				if($errors->first('description')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('description')));die;
				}
			}else{
				$setData['type'] = $request->input('type'); 
				$setData['title'] = $request->input('title'); 
				$setData['slug'] = $this->builtSlug($request->input('title'));
				$setData['tags'] = $request->input('tags');
				$setData['description'] = $request->input('description');
				$setData['seo_title'] = $request->input('seo_title');
				$setData['seo_description'] = $request->input('seo_description');
				$setData['seo_keyword'] = $request->input('seo_keyword');
				$setData['robot_tags'] = $request->input('robot_tags');
				
				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|image|mimes:jpeg,png,webp,jpg|max:10240'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
						$destination = base_path().'/public/img/blogs/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
					}
				}				
				$record = self::$Blogs->CreateRecord($setData);
                
                echo json_encode(array('heading'=>'Success','msg'=>'Blogs added successfully'));die;
			}
		}
		return view('/admin/blogs/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'description' => 'required',
            ],[
				'title.required' => 'Please enter title.',
				'description.required' => 'Please enter description.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
				if($errors->first('description')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('description')));die;
				}
			}else{
				$setData['id'] =  $RowID;
				$setData['type'] = $request->input('type'); 
				$setData['title'] = $request->input('title'); 
				$setData['slug'] = $this->builtSlug($request->input('title'));
				$setData['tags'] = $request->input('tags');
				$setData['description'] = $request->input('description');
				$setData['seo_title'] = $request->input('seo_title');
				$setData['seo_description'] = $request->input('seo_description');
				$setData['seo_keyword'] = $request->input('seo_keyword');
				$setData['robot_tags'] = $request->input('robot_tags');

				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|image|mimes:jpeg,webp,png,jpg|max:10240'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
						$destination = base_path().'/public/img/blogs/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$request->input('old_image'))){
								unlink($destination.$request->input('old_image'));
							}
						}
					}
				}
				self::$Blogs->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Blog updated successfully'));die;
			}
		}
		$rowData = self::$Blogs->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/blogs/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/blogs');
        }
    }
	
	public function addEventImages(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$rowData = self::$Blogs->where(array('id' => $RowID))->first();
		if(isset($rowData->id)){
            $banner_images = self::$Banners->where('status','!=',3)->where('gallery_id',$rowData->id)->get();	
			return view('/admin/blogs/add-event-images',compact('rowData','row_id','banner_images','RowID'));
        }else{
            return redirect('/admin/blogs');
        }		
	}
	
	public function uploadGallery(Request $request){
		if($request->ajax()){
            if(!empty($_FILES)){
				$postData = $request->all();
                $msg = "Error";
                $fileName = $_FILES['file']['name']; //Get the image
                $file_temp_name = $_FILES['file']['tmp_name'];
                $pathInfo = pathinfo(basename($fileName));
                $ext = $request->file->extension();
                $checkImage = getimagesize($file_temp_name);
				$actual_image_name = sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$request->file('file')).'.'.$request->file->extension();
				$destination2 = base_path().'/public/admin/images/images/';
                if($checkImage !== false){
					if($request->file->move($destination2, $actual_image_name)){						
						$setData['gallery_id'] = $request->input('gallery_id');
						$setData['banner'] = $actual_image_name;
						$record = self::$Banners->CreateRecord($setData);						
						$msg = "Success";
					}
                }
            }
            echo json_encode(array('msg' => $msg));
        }
        exit;
	}	
	
	
}