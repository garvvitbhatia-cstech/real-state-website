<?php
namespace App\Http\Controllers;

use App\Models\InnerPages;
use App\Models\News;
use App\Models\TollFree;
use App\Models\Settings;
use App\Models\Newsletter;
use App\Models\Schedule;
use App\Models\Blogs;
use App\Models\OurOpening;
use App\Models\OurTeam;
use App\Models\Category;
use App\Models\Awards;
use App\Models\Products;
use App\Models\ProductImages;
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

use App\Mail\ContactMail;

class AjaxController extends Controller
{
    private static $InnerPages;
	private static $Category;
	private static $Products;
	private static $ProductImages;
	private static $News;
	private static $Awards;
	private static $OurTeam;
	private static $OurOpening;
	private static $Blogs;
	private static $TollFree;		
	private static $Settings;
	private static $Newsletter;
	private static $Schedule;
	
	public function __construct(){
		self::$InnerPages = new InnerPages();
		self::$Category = new Category();
		self::$Products = new Products();
		self::$ProductImages = new ProductImages();
		self::$News = new News();
		self::$Awards = new Awards();
		self::$OurTeam = new OurTeam();
		self::$OurOpening = new OurOpening();
		self::$Blogs = new Blogs();
		self::$TollFree = new TollFree();
		self::$Settings = new Settings();
		self::$Newsletter = new Newsletter();
		self::$Schedule = new Schedule();
	}
	
	#getTollFree
    public function getTollFree(Request $request){
		if($request->ajax()){
			$id = $request->input('id');
			if($id != ''){
				$toll_free = self::$TollFree->where('id',$id)->first();				
				echo view('/ajax/get_toll_free',compact('toll_free'));	
			}
		}
		exit;
    }
	
	#getNews
    public function getNews(Request $request){
		if($request->ajax()){
			$newsyear = $request->input('newsyear');			
			$newsmonth = $request->input('newsmonth');
			if($newsyear != '' && $newsmonth != ''){
				$news = self::$News->where('year',$newsyear)->where('month',$newsmonth)->get();				
				echo view('/ajax/get_news',compact('news'));	
			}
		}
		exit;
    }
	
	#saveNewsletter
    public function saveNewsletter(Request $request){
		if($request->ajax()){
			$name = $request->input('newsletter_name');			
			$email = strtolower(trim($request->input('newsletter_email')));
			$phone = $request->input('newsletter_phone');

			$validator = Validator::make($request->all(),[
				'newsletter_name' => 'required|string',
				'newsletter_phone' => 'required|digits:10',
				'newsletter_email' => 'required|email',					
			],[
				'newsletter_name.required' => 'Please enter name.',
				'newsletter_name.string' => 'Please enter valid name.',				
				'newsletter_phone.required' => 'Please enter contact.',
				'newsletter_phone.digits' => 'Please enter valid contact.',
				'newsletter_email.required' => 'Please enter email.',
				'newsletter_email.email' => 'Please enter valid email.',
			]);
			
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('newsletter_name')){
					return json_encode(array('heading'=>'Error','msg'=>$errors->first('newsletter_name')));die;
				}				
				if($errors->first('newsletter_phone')){
					return json_encode(array('heading'=>'Error','msg'=>$errors->first('newsletter_phone')));die;
				}
				if($errors->first('newsletter_email')){
					return json_encode(array('heading'=>'Error','msg'=>$errors->first('newsletter_email')));die;
				}
			}else{

				if($_POST['g-recaptcha-response'] && !empty($_POST['g-recaptcha-response'])){
					$verifyCaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfRW9IqAAAAAD9ZlF927L3ijH8jCMyBzBGipLt9&response=".$_POST['g-recaptcha-response']);
					$verifyCaptcha = json_decode($verifyCaptcha);
					if($verifyCaptcha->success){
						$emailExist = self::$Newsletter::where('email',$email)->count();
						if($emailExist == 0){
							Session::forget('captcha_code');
							$setData['name'] = strip_tags($name); 
							$setData['email'] = strip_tags($email); 
							$setData['phone'] = strip_tags($phone); 
							self::$Newsletter->CreateRecord($setData);						
						}
						echo json_encode(array('heading'=>'Success','msg'=>'Newsletter subscribed successfully'));die;	
					}else{
						echo json_encode(array('heading'=>'Error','msg'=>'Please enter valid captcha code'));die;	
					}
										
				}else{
					echo json_encode(array('heading'=>'Error','msg'=>'Please enter valid captcha code'));die;	
				}
			}
			
		}
		exit;
    }
	
	#saveSchedule
    public function saveSchedule(Request $request){
		if($request->ajax()){
			if($_POST['g-recaptcha-response'] && !empty($_POST['g-recaptcha-response'])){
				
				$verifyCaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfRW9IqAAAAAD9ZlF927L3ijH8jCMyBzBGipLt9&response=".$_POST['g-recaptcha-response']);
				$verifyCaptcha = json_decode($verifyCaptcha);
				if($verifyCaptcha->success){
					$name = $request->input('schedule_name');			
					$email = strtolower(trim($request->input('schedule_email')));
					$phone = $request->input('schedule_contact');
					$date = $request->input('schedule_date');
					$time = $request->input('schedule_time');
		
					if($phone != '' && $email != '' && $name != ''  && $date != ''  && $time != '' && filter_var($email, FILTER_VALIDATE_EMAIL)){
						$setData['name'] = $name; 
						$setData['email'] = $email; 
						$setData['contact'] = $phone; 
						$setData['time'] = $time; 
						$setData['date'] = $date; 
						self::$Schedule->CreateRecord($setData);
						$data = [
							'name' => ucwords($name),
							'email' => strtolower($email),
							'contact' => $phone,
							'time' => $time,
							'date' => $date,
						];
						Mail::to([strtolower(trim('sales@navkar.city'))])->send(new ContactMail($data));
					}
					echo 'Success';
				}else{
					echo 'Error';
				}
				
				
			}else{
				echo 'Error';
			}
			
		}
		exit;
    }
		
	#searchProjects
    public function searchProjects(Request $request){
		if($request->ajax()){
			$query = self::$Products->where('status',1)->where('id','!=',3);

			$project_name = trim($request->input('project_name'));
			$category = trim($request->input('category'));
			$budget = trim($request->input('budget'));
			$city = $request->input('city');
			$types = $request->input('types');
			$construction = $request->input('construction');

			if($project_name!=''){
				$query->where('title','like','%'.$project_name.'%');
			}
			if($category!=''){
				$query->where('category_id',$category);
			}
			if($budget!=''){
				$query->whereBetween('price', [0, $budget]);
			}
			if($city!=''){
				$maxcity = implode(',',$city);
				if($maxcity != ''){
					$query->whereRaw('FIND_IN_SET(city_id,"'.$maxcity.'")');
				}
			}
			if($types!=''){
				$maxtype = implode(',',$types);
				if($maxtype != ''){
					$query->whereRaw('FIND_IN_SET(type,"'.$maxtype.'")');
				}
			}
			if($construction!=''){
				$maxconstruction = implode(',',$construction);
				if($maxconstruction != ''){
					$query->whereRaw('FIND_IN_SET(property_status,"'.$maxconstruction.'")');
				}
			}
			$products = $query->paginate(15);
			echo view('/ajax/get_products',compact('products'));
		}
		exit;
    }
	
	##getCategoryImages
	public function getCategoryImages(Request $request){
		if($request->ajax()){
			$type = trim($request->input('type'));	
			$id = trim($request->input('id'));	
			$images = self::$ProductImages->where('status',1)->where('product_id',$id)->where('type',$type)->get();
			echo view('/ajax/get_category_images',compact('images'));
		}
		exit;
	}
	
	##getCategoryImages
	public function getUnitImages(Request $request){
		if($request->ajax()){
			$type = trim($request->input('type'));
			$images = self::$ProductImages->where('status',1)->where('type','Unit Plan')->whereIn('title', [$type])->get();
			echo view('/ajax/get_unit_images',compact('images'));
		}
		exit;
	}

}