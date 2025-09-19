<?php
namespace App\Http\Controllers\Admin;
 
use Hash;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider; 
use Illuminate\Http\Request;
use App\Http\Requests; 
use App\Item;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Banner;
 
class GalleryController extends Controller{
	
	private static $Banner;
	public function __construct(){
		self::$Banner = new Banner();
	}
	
	#admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/gallery/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Banner->where('status', '!=', 3);

		if($request->input('page') != ''){
			$page = $request->input('page');
            $query->where('page', 'like', '%'.$page.'%');
		}
		if($request->input('status') != ''){
			$status = $request->input('status');
            $query->where('status', $status);
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/gallery/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'page' => 'required',
            ],[
				'page.required' => 'Please enter page.'
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('page')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('page')));die;
				}
			}else{
				$setData['page'] = $request->input('page'); 
				$setData['heading'] = $request->input('heading');
				$setData['text'] = $request->input('text');
				
				if(isset($request->banner) && $request->banner->extension() != ""){
					$validator = Validator::make($request->all(), [
						'banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('banner')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('banner')).'.'.$request->banner->extension());
						$destination = base_path().'/public/img/blogs/';
						$request->banner->move($destination, $actual_image_name);
						$setData['banner'] = $actual_image_name;
					}
				}				
				$record = self::$Banner->CreateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Banner added successfully'));die;
			}
		}
		return view('/admin/gallery/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'page' => 'required',
            ],[
				'page.required' => 'Please enter page.'
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('page')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('page')));die;
				}
			}else{
				$setData['id'] =  $RowID;
				$setData['page'] = $request->input('page'); 
				$setData['heading'] = $request->input('heading');
				$setData['text'] = $request->input('text');

				if(isset($request->banner) && $request->banner->extension() != ""){
					$validator = Validator::make($request->all(), [
						'banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('banner')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('banner')).'.'.$request->banner->extension());
						$destination = base_path().'/public/img/blogs/';
						$request->banner->move($destination, $actual_image_name);
						$setData['banner'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$request->input('old_image'))){
								unlink($destination.$request->input('old_image'));
							}
						}
					}
				}
				self::$Banner->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Gallery updated successfully'));die;
			}
		}
		$rowData = self::$Banner->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/gallery/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/gallery');
        }
    }

}