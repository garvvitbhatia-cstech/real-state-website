<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
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

class NewsController extends Controller
{
	private static $News;
    private static $TokenHelper;
	public function __construct(){
		self::$News = new News();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/news/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$News->where('status', '!=', 3);

		if($request->input('title')  && $request->input('title') != ""){
            $title = $request->input('title');
            $query->where('title', 'like', '%'.$title.'%');
		}
		if($request->input('year')  && $request->input('year') != ""){
            $year = $request->input('year');
            $query->where('year', $year);
		}		
		if($request->input('month')  && $request->input('month') != ""){
            $month = $request->input('month');
            $query->where('month', $month);
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/news/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'year' => 'required',
				'month' => 'required',
				'title' => 'required',
            ],[
				'year.required' => 'Please enter year.',
				'month.required' => 'Please enter month.',
				'title.required' => 'Please enter title.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('year')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('year')));die;
				}
				if($errors->first('month')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('month')));die;
				}
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
				$setData['title'] = $request->input('title');
				$setData['month'] = $request->input('month');
				$setData['year'] = $request->input('year');
				$setData['description'] = $request->input('description');
				
				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|mimes:pdf|max:10240'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
						$destination = base_path().'/public/img/news/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
					}
				}				
				$record = self::$News->CreateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'News added successfully'));die;
			}
		}
		return view('/admin/news/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$rowData = self::$News->where(array('id' => $RowID))->first();
        if($request->input()){
			$validator = Validator::make($request->all(), [
				'year' => 'required',
				'month' => 'required',
				'title' => 'required',
            ],[
				'year.required' => 'Please enter year.',
				'month.required' => 'Please enter month.',
				'title.required' => 'Please enter title.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('year')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('year')));die;
				}
				if($errors->first('month')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('month')));die;
				}
				if($errors->first('title')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('title')));die;
				}
			}else{
				$setData['id'] =  $RowID;
				$setData['title'] = $request->input('title');
				$setData['month'] = $request->input('month');
				$setData['year'] = $request->input('year');
				$setData['description'] = $request->input('description');

				if(isset($request->image) && $request->image->extension() != ""){
					$validator = Validator::make($request->all(), [
						'image' => 'required|mimes:pdf|max:10240'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('image')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->image->extension());
						$destination = base_path().'/public/img/news/';
						$request->image->move($destination, $actual_image_name);
						$setData['image'] = $actual_image_name;
						if($rowData->image != ""){
							if(file_exists($destination.$rowData->image)){
								unlink($destination.$rowData->image);
							}
						}
					}
				}
				self::$News->UpdateRecord($setData);
			}
			echo json_encode(array('heading'=>'Success','msg'=>'News updated successfully'));die;
		}
		
        if(isset($rowData->id)){
            return view('/admin/news/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/news');
        }
    }
}