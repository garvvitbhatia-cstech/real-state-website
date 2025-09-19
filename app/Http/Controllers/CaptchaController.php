<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\RouteHelper;
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

class CaptchaController extends Controller {
    private static $Settings;
	
    public function __construct(){
        self::$Settings = new Settings();
    }
	
    public function myCaptcha(){
        return view('myCaptcha');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaPost(Request $request){
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);
        dd("You are here :) .");
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function refreshCaptcha(){
        return response()->json(['captcha'=> captcha_img()]);
    }
	
}
