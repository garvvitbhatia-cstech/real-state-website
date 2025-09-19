<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\RouteHelper;
use App\Models\TokenHelper;
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

use App\Models\State;

class AjaxController extends Controller
{
    private static $TokenHelper;
	public function __construct(){
        self::$TokenHelper = new TokenHelper();
	}
	
    public function changeStatus(Request $request){
		if(!$request->session()->has('admin_email')){echo 'SessionExpire'; die;}
		$tableName = $request->input('table');
		$rowID = $request->input('rowID');
		$status = $request->input('status');
		if($tableName != "" && $rowID != "" && $status != "" && is_numeric($rowID) && is_numeric($status)){            
            $newStatus = $status == 1 ? 2 : 1;
			DB::table($tableName)->where(array('id' => $rowID))->update(array('status' => $newStatus));
			echo 'Success';die;
		}else{
			echo 'InvalidData'; die;
		}
    }

    public function deleteRecord(Request $request){
		if(!$request->session()->has('admin_email')){echo 'SessionExpire'; die;}
		$tableName = $request->input('table');
		$rowID = $request->input('rowID');
		if($tableName != "" && $rowID != "" && is_numeric($rowID)){            
            DB::table($tableName)->where(array('id' => $rowID))->update(array('status' => 3));
			echo 'Success';die;
		}else{
			echo 'InvalidData'; die;
		}
    }
	
	public function getState(Request $request){
		if($request->ajax()){
			$country_id = $request->input('countryId');
			$states = DB::table('states')->where('country_id',$country_id)->where('status',1)->orderBy('state')->pluck('state','id');

			echo view('/admin/ajax/get_state',compact('states'));
		}
		exit;
	}
	
	public function getCity(Request $request){
		if($request->ajax()){
			$state_id = $request->input('stateId');
			$cities = DB::table('cities')->where('state_id',$state_id)->where('status',1)->orderBy('city')->pluck('city','id');

			echo view('/admin/ajax/get_city',compact('cities'));
		}
		exit;
	}	

}