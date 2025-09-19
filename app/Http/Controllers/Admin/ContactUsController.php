<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;
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

class ContactUsController extends Controller
{
	private static $Contacts;
    private static $TokenHelper;
	public function __construct(){
		self::$Contacts = new Contact();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/contacts/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Contacts->where('read_status', '!=', 3);

		if($request->input('read_status')  && $request->input('read_status') != ""){
            $read_status = $request->input('read_status');
            $query->where('read_status', $read_status);
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/contacts/paginate',compact('records'));
    }

    #edit Service Type
    public function viewPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

		$rowData = self::$Contacts->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
			$setData['id'] = $rowData->id;
			$setData['read_status'] = 1;
			self::$Contacts->UpdateRecord($setData);
            return view('/admin/contacts/view-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/contacts');
        }
    }
}