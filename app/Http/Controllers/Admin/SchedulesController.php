<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
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

class SchedulesController extends Controller
{
	private static $Schedules;
    private static $TokenHelper;
	public function __construct(){
		self::$Schedules = new Schedule();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/schedules/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Schedules->where('status', '!=', 3);

		if($request->input('read_status')  && $request->input('read_status') != ""){
            $read_status = $request->input('read_status');
            $query->where('status', $read_status);
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/schedules/paginate',compact('records'));
    }

    #edit Service Type
    public function viewPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}

		$rowData = self::$Schedules->where(array('id' => $RowID))->first();
        if(isset($rowData->id)){
			$setData['id'] = $rowData->id;
			$setData['status'] = 2;
			self::$Schedules->UpdateRecord($setData);
            return view('/admin/schedules/view-page',compact('rowData','row_id'));
        }else{
            return redirect('/admin/schedules');
        }
    }

}