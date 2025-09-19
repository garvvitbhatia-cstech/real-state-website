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
use App\Models\Products;
use App\Models\Galleries;
 
class GalleryImagesController extends Controller{
	
	private static $Products;
	private static $Galleries;
	public function __construct(){
		self::$Products = new Products();
		self::$Galleries = new Galleries();
	}
	
	#admin dashboard page
    public function getList(Request $request,$row_id = NULL){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$rowId = base64_decode($row_id);
		$product = self::$Products->where('id',$rowId)->first();
		if(isset($product->id)){
			return view('/admin/gallery_images/index',compact('row_id'));	
		}else{
			return redirect('/admin/products');
		}        
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Galleries->where('status', '!=', 3);
		$query->where('product_id', $request->input('product_id'));
		if($request->input('category') != ''){
			$category = $request->input('category');
            $query->where('category', 'like', '%'.$category.'%');
		}
		if($request->input('status') != ''){
			$status = $request->input('status');
            $query->where('status', $status);
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/gallery_images/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request,$row_id = NULL){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'title' => 'required',
            ],[
				'title.required' => 'Please enter title.'
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
				$setData['category'] = $request->input('category'); 
				$setData['title'] = $request->input('title'); 
				$setData['category_slug'] = Str::slug($request->input('category'));
				$setData['product_id'] = base64_decode($row_id);
				if(isset($request->banner) && $request->banner->extension() != ""){
					$validator = Validator::make($request->all(), [
						'banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:20480'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('banner')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('banner')).'1.'.$request->banner->extension());
						$destination = base_path().'/public/img/products/';
						$request->banner->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
					}
				}				
				$record = self::$Galleries->CreateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Banner added successfully'));die;
			}
		}
		$rowId = base64_decode($row_id);
		$product = self::$Products->where('id',$rowId)->first();
		if(isset($product->id)){
			return view('/admin/gallery_images/add-page',compact('row_id'));
		}
		
    }

    #edit Service Type
    public function editPage(Request $request, $row_id = NULL){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'title' => 'required',
            ],[
				'title.required' => 'Please enter title.'
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
				$setData['id'] =  $RowID;
				$setData['category'] = $request->input('category'); 
				$setData['category_slug'] = Str::slug($request->input('category'));
				$setData['title'] = $request->input('title'); 
				//$setData['product_id'] = base64_decode($row_id);
				if(isset($request->banner) && $request->banner->extension() != ""){
					$validator = Validator::make($request->all(), [
						'banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:20480'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('banner')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('banner')).'2.'.$request->banner->extension());
						$destination = base_path().'/public/img/products/';
						$request->banner->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$request->input('old_image'))){
								unlink($destination.$request->input('old_image'));
							}
						}
					}
				}
				self::$Galleries->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Gallery updated successfully'));die;
			}
		}
		$rowData = self::$Galleries->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/gallery_images/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/products');
        }
    }

}