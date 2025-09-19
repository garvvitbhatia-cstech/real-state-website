<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Faqs;
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

class FaqsController extends Controller
{
	private static $Faqs;
    private static $TokenHelper;
	public function __construct(){
		self::$Faqs = new Faqs();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/faqs/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Faqs->where('status', '!=', 3);

		if($request->input('type')  && $request->input('type') != ""){
            $type = $request->input('type');
            $query->where('type', 'like', '%'.$type.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/faqs/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'type' => 'required',
				'question' => 'required',
				'answer' => 'required',
            ],[
				'type.required' => 'Please enter title.',
				'question.required' => 'Please enter description.',
				'answer.required' => 'Please enter description.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('type')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('type')));die;
				}
				if($errors->first('question')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('question')));die;
				}
				if($errors->first('answer')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('answer')));die;
				}
			}else{
				$setData['type'] = $request->input('type'); 
				$setData['question'] = $request->input('question');
				$setData['answer'] = $request->input('answer');
				$record = self::$Faqs->CreateRecord($setData); 
				               
                echo json_encode(array('heading'=>'Success','msg'=>'Faq added successfully'));die;
			}
		}
		return view('/admin/faqs/add-page');
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'type' => 'required',
				'question' => 'required',
				'answer' => 'required',
            ],[
				'type.required' => 'Please enter title.',
				'question.required' => 'Please enter description.',
				'answer.required' => 'Please enter description.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('type')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('type')));die;
				}
				if($errors->first('question')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('question')));die;
				}
				if($errors->first('answer')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('answer')));die;
				}
			}else{
				$setData['id'] =  $RowID;
				$setData['type'] = $request->input('type'); 
				$setData['question'] = $request->input('question');
				$setData['answer'] = $request->input('answer');
				self::$Faqs->UpdateRecord($setData);

                echo json_encode(array('heading'=>'Success','msg'=>'Faq updated successfully'));die;
			}
		}
		$rowData = self::$Faqs->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
            return view('/admin/faqs/edit-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/faqs');
        }
    }

}