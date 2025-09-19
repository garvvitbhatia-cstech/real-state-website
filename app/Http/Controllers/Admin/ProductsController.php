<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\Category;
use App\Models\City;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\Responses;
use ReallySimpleJWT\Token;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Session;
use Validator;
use Mail;
use URL;
use Cookie;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
	private static $ProductsModel;
    private static $CategoriesModel;
	private static $CitiesModel;
	private static $ProductImagesModel;
		
	public function __construct(){
		self::$ProductsModel = new Products();
		self::$CategoriesModel = new Category();
		self::$CitiesModel = new City();
		self::$ProductImagesModel = new ProductImages();
	}

    #admin dashboard page
    public function getList(Request $request,$vendor=NULL,$month=NULL,$year=NULL){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}		       
		$admin_type = $request->session()->get('admin_type');
		$admin_id = $request->session()->get('admin_id');
        return view('/admin/products/index',compact(array('admin_type','admin_id')));
    }
	#admin 
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

		$admin_type = $request->session()->get('admin_type');
		$admin_id = $request->session()->get('admin_id');		
        $query = self::$ProductsModel->join('categories','categories.id','=','products.category_id');
        $query->select(['products.*','categories.title as category_name']);
        $query->where('products.status', '!=', 3);
		//$query->where('products.id', '!=', 3);

		if($request->input('title')  && $request->input('title') != ""){
            $SearchKeyword = $request->input('title');
            $query->where(function($query) use ($SearchKeyword){
                if(!empty($SearchKeyword)){
                    $query->where('products.title', 'like', '%'.$SearchKeyword.'%')
                    ->orWhere('categories.title', 'like', '%'.$SearchKeyword.'%');
                }
             });
		}		
		$records =  $query->orderBy('products.id', 'DESC')->simplePaginate(100);
		$admin_type = $request->session()->get('admin_type');
		$admin_id = $request->session()->get('admin_id');
        return view('/admin/products/paginate',compact('records','admin_type','admin_id'));
    }

    #add new Product
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
                'title' => 'required',
                'category_id' => 'required',
                'city_id' => 'required',
                'type' => 'required',
                'property_status' => 'required',
				'price' => 'required',
				'possession_date' => 'required',
				'address' => 'required',
				'location' => 'required'
            ],[
                'title.required' => 'Please enter product name.',
                'category_id.required' => 'Please select product category.',
                'city_id.required' => 'Please select product city.',
                'type.required' => 'Please select product type.',
                'property_status.required' => 'Please select property status.',
				'price.required' => 'Please select product price.',
				'possession_date.required' => 'Please select product possession date.',
				'address.required' => 'Please select product address.',
				'location.required' => 'Please select product location.'
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
                if($errors->first('category_id')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('category_id')));die;
				}
                if($errors->first('city_id')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('city_id')));die;
				}
                if($errors->first('property_status')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('property_status')));die;
				}
				if($errors->first('price')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('price')));die;
				}
				if($errors->first('possession_date')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('possession_date')));die;
				}
				if($errors->first('address')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('address')));die;
				}
				if($errors->first('location')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('location')));die;
				}
			}else{
                if(!self::$ProductsModel->ExistingRecord($request->input('title'))){					
                    $setData['title'] = $request->input('title');
                    $setData['slug'] = Str::slug($request->input('title'));
                    $setData['category_id'] = $request->input('category_id');
                    $setData['city_id'] = $request->input('city_id'); 
                    $setData['type'] = $request->input('type');
                    $setData['property_status'] = $request->input('property_status'); 
                    $setData['price'] = $request->input('price');
                    $setData['possession_date'] = $request->input('possession_date');
                    $setData['address'] = $request->input('address');
                    $setData['location'] = $request->input('location');
                    $setData['description'] = $request->input('description');
					$setData['video_url'] = $request->input('video_url');
					$setData['seo_title'] = $request->input('seo_title');
					$setData['seo_description'] = $request->input('seo_description');
					$setData['seo_keyword'] = $request->input('seo_keyword');
					$setData['robot_tags'] = $request->input('robot_tags');

					if(isset($request->image) && $request->image->extension() != ""){
                        $validator = Validator::make($request->all(), [
                            'image' => 'required|image|mimes:jpeg,png,jpg,webp'
                        ]);
                        if($validator->fails()){
                            $errors = $validator->errors();
                            return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
                        }else{
							$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
                            $destination = base_path().'/public/img/products/';
                            $request->image->move($destination, $actual_image_name);
                            $setData['image'] = $actual_image_name;
                        }
                    }
                    $record = self::$ProductsModel->CreateRecord($setData);
					
					echo json_encode(array('heading'=>'Success','page'=>$request->input('page_path'),'msg'=>'Product added successfully','recordID' => base64_encode($record->id)));die;
                }else{
					echo json_encode(array('heading'=>'Error','page'=>$request->input('page_path'),'msg'=>'Product already exists'));die;	
				}                
			}
		}
		$admin_type = $request->session()->get('admin_type');
		$admin_id = $request->session()->get('admin_id');		
        $categories = self::$CategoriesModel->where('status',1)->get();
        $cities = self::$CitiesModel->where('status',1)->where('country_id',101)->orderBy('city')->get();
		return view('/admin/products/add-page',compact('categories','cities','admin_id','admin_type'));
    }

    #edit Product
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
                'title' => 'required',
                'category_id' => 'required',
                'city_id' => 'required',
                'type' => 'required',
                'property_status' => 'required',
				'price' => 'required',
				'possession_date' => 'required',
				'address' => 'required',
				'location' => 'required'
            ],[
                'title.required' => 'Please enter product name.',
                'category_id.required' => 'Please select product category.',
                'city_id.required' => 'Please select product city.',
                'type.required' => 'Please select product type.',
                'property_status.required' => 'Please select property status.',
				'price.required' => 'Please select product price.',
				'possession_date.required' => 'Please select product possession date.',
				'address.required' => 'Please select product address.',
				'location.required' => 'Please select product location.'
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
                if($errors->first('category_id')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('category_id')));die;
				}
                if($errors->first('city_id')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('city_id')));die;
				}
                if($errors->first('property_status')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('property_status')));die;
				}
				if($errors->first('price')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('price')));die;
				}
				if($errors->first('possession_date')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('possession_date')));die;
				}
				if($errors->first('address')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('address')));die;
				}
				if($errors->first('location')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('location')));die;
				}
			}else{
                //profile image
                if(self::$ProductsModel->ExistingRecordUpdate($request->input('title'), $RowID)){
                    echo json_encode(array('heading'=>'Error','msg'=>'Product already exists.'));die;
                }else{
                    $setData['id'] =  $RowID;
                    $setData['title'] = $request->input('title');
                    $setData['slug'] = Str::slug($request->input('title'));
                    $setData['category_id'] = $request->input('category_id');
                    $setData['city_id'] = $request->input('city_id'); 
                    $setData['type'] = $request->input('type');
                    $setData['property_status'] = $request->input('property_status'); 
                    $setData['price'] = $request->input('price');
                    $setData['possession_date'] = $request->input('possession_date');
                    $setData['address'] = $request->input('address');
                    $setData['location'] = $request->input('location');
                    $setData['description'] = $request->input('description');
					$setData['video_url'] = $request->input('video_url');
					$setData['seo_title'] = $request->input('seo_title');
					$setData['seo_description'] = $request->input('seo_description');
					$setData['seo_keyword'] = $request->input('seo_keyword');
					$setData['robot_tags'] = $request->input('robot_tags');
					if(isset($request->image) && $request->image->extension() != ""){
                        $validator = Validator::make($request->all(), [
                            'image' => 'required|image|mimes:jpeg,png,jpg,webp'
                        ]);
                        if($validator->fails()){
                            $errors = $validator->errors();
                            return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
                        }else{
							$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
                            $destination = base_path().'/public/img/products/';
                            $request->image->move($destination, $actual_image_name);
                            $setData['banner'] = $actual_image_name;
                            if($request->input('old_image') != ""){
                                if(file_exists($destination.$request->input('old_image'))){
                                    unlink($destination.$request->input('old_image'));
                                }
                            }
                        }
                    }					
					if(self::$ProductsModel->UpdateRecord($setData)){
						if($request->input('images')){
							foreach($request->input('images') as $key => $image){
								$setImg['image'] = $image;
								$setImg['category_id'] = $request->input('category_id');
								$setImg['product_id'] = $RowID;
								self::$ProductImagesModel->CreateRecord($setImg);
							}
						}	
					}
               	}
                echo json_encode(array('heading'=>'Success','page'=>$request->input('page_path'),'msg'=>'Product information updated successfully','recordID' => base64_encode($RowID)));die;
			}
		}
		$admin_type = $request->session()->get('admin_type');
		$admin_id = $request->session()->get('admin_id');
		$rowData = self::$ProductsModel->where(array('id' => $RowID))->first();	
        if(isset($rowData->id)){
            $categories = self::$CategoriesModel->where('status',1)->get();
        	$cities = self::$CitiesModel->where('status',1)->where('country_id',101)->get();
			$banner_images = self::$ProductImagesModel->where('product_id',$RowID)->where('status','!=',3)->get();			
            return view('/admin/products/edit-page',compact('rowData','row_id','categories','cities','banner_images'));
        }else{
            return redirect('/admin/products');
        }
    }
	
	############ update produt title ###############
	public function updateProductTitle(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        if($request->input()){
			$setData['id'] = $request->input('id');
			$setData[$request->input('field')] = $request->input('value');			
			self::$ProductImagesModel->UpdateRecord($setData);
			echo "Success";die;
		}	
	}

	public function updateProductFile(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$msg['msg'] = 'Error';
		if(isset($request->file) && $request->file->extension() != ""){
			$validator = Validator::make($request->all(), [
				'file' => 'required|image|mimes:jpeg,png,jpg,webp'
			]);
			if($validator->fails()){
				$errors = $validator->errors();
				return json_encode(array('heading'=>'Error','msg'=>$errors->first('file')));die;
			}else{
				$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('file')).'.'.$request->file->extension());
				$destination = base_path().'/public/img/products/';
				$request->file->move($destination, $actual_image_name);
				$setData['image'] = $actual_image_name;
				if($request->input('old_image') != ""){
					if(file_exists($destination.$request->input('old_image'))){
						unlink($destination.$request->input('old_image'));
					}
				}
				$setData['id'] = $request->input('id');
				self::$ProductImagesModel->UpdateRecord($setData);
				$msg['msg'] = 'Success';
			}
		}
		echo json_encode(array('data'=>$msg));die;
	}

    /************** uploadProductImages ************/
	public function uploadProductImages(Request $request){
        //profile image
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
            $tempName =$_FILES['file']['tmp_name'];
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $allowed =  array('png','PNG','jpg','jpeg','JPEG','JPG','webp','WEBP');
            //$newFileName = date('d_m_Y_H_i_s'.mt_rand(000,111).'_a.').$ext;
			$newFileName = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(mt_rand().true).$_FILES['file']['name']).'.'.$ext);
            if(in_array($ext,$allowed)) {
                move_uploaded_file($tempName,base_path().'/public/img/products/'.$newFileName);
            }
            echo $newFileName;die;
        }
        echo json_encode(array('heading'=>'Success','data'=>""));die;
	}

    /************** builtSlug ************/
	public function builtSlug($input_lines){
		preg_match_all("/[0-9A-Za-z\s]/", trim($input_lines), $output_array);
		$slug = strtolower(preg_replace("/[\s]/", "-", join($output_array[0])));
		$temp_string = preg_replace("/-{2,}/", "-", $slug);
		return $temp_string;
	}

}