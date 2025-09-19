<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
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

class NewsletterController extends Controller
{
	private static $Newsletter;
    private static $TokenHelper;
	public function __construct(){
		self::$Newsletter = new Newsletter();
        self::$TokenHelper = new TokenHelper();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        return view('/admin/newsletter/index');
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$Newsletter->where('id', '!=', '');
		if($request->input('email')  && $request->input('email') != ""){
            $email = $request->input('email');
            $query->where('email', $email);
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/newsletter/paginate',compact('records'));
    }
	
}