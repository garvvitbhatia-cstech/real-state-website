<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CouponCodes;
use App\RouteHelper;
use App\Models\TokenHelper;
use App\Models\InnerPages;
use App\Models\Responses;
use ReallySimpleJWT\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Session;
use Validator;
use Mail;
use URL;
use Cookie;
use Illuminate\Validation\Rule;

class InnerPagesController extends Controller
{
	private static $InnerPages;
	
	public function __construct(){
		self::$InnerPages = new InnerPages();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/inner_pages/index');
    }

    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$InnerPages->where('status', '!=', 3);
		if($request->input('title')  && $request->input('title') != ""){
            $SearchKeyword = $request->input('title');
            $query->where('title', 'like', '%'.$SearchKeyword.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/inner_pages/paginate',compact('records'));
    }

    #edit Brand
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		$rowData = self::$InnerPages->where(array('id' => $RowID))->first();
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
                'title' => 'required'
            ],[
                'title.required' => 'Please enter title.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
				if(!empty($request->file('banner'))){
					$actual_image_name2 = sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('banner')).'.'.$request->banner->extension();
					$destination2 = base_path().'/public/img/banners/';
					if($request->banner->move($destination2, $actual_image_name2)){
						if($rowData->banner != ""){
							if(file_exists($destination2.$rowData->banner)){
								unlink($destination2.$rowData->banner);
							}
						}
						$banner = $actual_image_name2;
						$setData['banner'] = $banner;
					}
				}
				$setData['id'] =  $RowID;
				$setData['title'] = $request->input('title');
				$setData['slug'] = $this->builtSlug($request->input('title'));
				$setData['description'] = trim($request->description);				
				$setData['banner_status'] = $request->banner_status;
				$setData['heading'] = $request->heading;
				$setData['sub_heading'] = $request->sub_heading;
				$setData['seo_title'] = $request->seo_title;
				$setData['seo_description'] = $request->seo_description;
				$setData['seo_keyword'] = $request->seo_keyword;
				$setData['robot_tags'] = $request->robot_tags;
				self::$InnerPages->UpdateRecord($setData);
			}
			echo json_encode(array('heading'=>'Success','msg'=>'Content updated successfully'));die;
		}
		
		
        if(isset($rowData->id)){
            return view('/admin/inner_pages/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/newsletter');
        }
    }

}