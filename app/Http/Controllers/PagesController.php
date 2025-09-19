<?php
namespace App\Http\Controllers;
use App\Models\InnerPages;
use App\Models\Banner;
use App\Models\Faqs;
use App\Models\City;
use App\Models\TollFree;
use App\Models\Testimonials;
use App\Models\Settings;
use App\Models\Blogs;
use App\Models\EventImages;
use App\Models\OurOpening;
use App\Models\OurTeam;
use App\Models\Category;
use App\Models\Awards;
use App\Models\Products;
use App\Models\ProductImages;
use App\Models\Galleries;
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

class PagesController extends Controller
{
    private static $InnerPages;
	private static $Category;
	private static $Products;
	private static $ProductImages;
	private static $Banners;
	private static $Awards;
	private static $OurTeam;
	private static $OurOpening;
	private static $Blogs;
	private static $TollFree;		
	private static $Settings;		
	private static $Faqs;
	private static $City;
	private static $EventImages;
	private static $Testimonials;	
	private static $Galleries;		
	
	public function __construct(){
		self::$InnerPages = new InnerPages();
		self::$Category = new Category();
		self::$Products = new Products();
		self::$ProductImages = new ProductImages();
		self::$Banners = new Banner();
		self::$Awards = new Awards();
		self::$OurTeam = new OurTeam();
		self::$OurOpening = new OurOpening();
		self::$Blogs = new Blogs();
		self::$TollFree = new TollFree();
		self::$Settings = new Settings();
		self::$Faqs = new Faqs();
		self::$City = new City();
		self::$Testimonials = new Testimonials();
		self::$EventImages = new EventImages();
		self::$Galleries = new Galleries();
	}
	
	public function unitPlan(Request $request, $slug){
		if(!empty($slug)){
			$typeArr = [];
			if($slug == 'Apartment'){
				$unitPlan = self::$ProductImages->where('status',1)->where('type','Unit Plan')->whereIn('title', ['2 BHK', '2 BHK+Study', 'Luxury 3BHK'])->get();
				$types = self::$ProductImages->select('title')->where('status',1)->where('type','Unit Plan')->whereIn('title', ['2 BHK', '2 BHK+Study', 'Luxury 3BHK'])->groupBy('title')->get();
				foreach($types as $key => $type){
					$typeArr[$type->title] = $type->title;
				}
				$type = array('2 BHK' => '2 BHK', '2 BHK+Study' => '2 BHK+Study', 'Luxury 3BHK' => 'Luxury 3BHK');
			}elseif($slug == 'Villa'){
				$unitPlan = self::$ProductImages->where('status',1)->where('type','Unit Plan')->whereIn('title', ['Villa 1', 'Villa 2', 'Villa 3'])->get();
				$types = self::$ProductImages->select('title')->where('status',1)->where('type','Unit Plan')->whereIn('title', ['Villa 1', 'Villa 2', 'Villa 3'])->groupBy('title')->get();
				foreach($types as $key => $type){
					$typeArr[$type->title] = $type->title;
				}
				$type = array('Villa 1' => 'Villa 1', 'Villa 2' => 'Villa 2', 'Villa 3' => 'Villa 3');
			}else{
				return redirect('/');		
			}	
			return view('/pages/unit_plan',compact('unitPlan','type','slug','typeArr'));		
		}else{
			return redirect('/');	
		}
	}
	
	#index page
    public function index(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 11,'status'=>1))->first();		
		$project = self::$Products->where('id',3)->first();
		if(isset($project->id)){
			$masterPlan = self::$ProductImages->where('status',1)->where('type','Master Plan')->where('product_id',$project->id)->first();			
			$unitPlan = self::$ProductImages->where('status',1)->where('type','Unit Plan')->where('product_id',$project->id)->skip(0)->take(21)->get();
			$unitPlan2 = self::$ProductImages->where('status',1)->where('type','Unit Plan')->where('product_id',$project->id)->skip(21)->take(13)->get();
			$images = self::$ProductImages->where('status',1)->where('type','Banner')->where('product_id',$project->id)->get();
			$gallery = self::$ProductImages->where('status',1)->where('type','Gallery')->where('product_id',$project->id)->limit(5)->get();
			$more_products = self::$Products->where('status',1)->where('id','!=',3)->where('id','!=',$project->id)->limit(3)->get();
			$mainAmenities = self::$ProductImages->where('status',1)->where('type','Main Amenities')->where('product_id',$project->id)->get();
			$events = self::$Blogs->where('status',1)->where('type','Event')->get();	
			$user_review = self::$Testimonials->where('status',1)->get();
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://graph.instagram.com/me/media?fields=media_url%2Cpermalink%2Ctimestamp%2Cthumbnail_url&access_token=IGQWROZAkZA6OVdoT2xNaWh4OWhteDFxWVhfUUZAmQUROWkozaTFCSG5EM2ZA3UjJJYTFXOElnZATFjVFIyeDdlcjFZAalhUZAlJfdnV1cEVDS3pKSTFPZAzZAPV2psWTFHMmJHMWkwcS1xNm85SE1WT0lwMWF0VGMzaGp0N0UZD',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
			  CURLOPT_POSTFIELDS => array('access_token' => '123'),
			  CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoyLCJleHAiOjE3MDUyMjYxMDUsImlzcyI6ImNybS5jb20iLCJpYXQiOjE3MDI2MzQxMDV9.pM-_wRxPAzjl-EIWZ2D2MhCpfb4l6-zZgOaJa1WRTS8',
				'Cookie: ig_did=EC398798-C9C1-42B3-8140-29F7ACD76C2D; ig_nrcb=1'
			  ),
			));
						
			$response = curl_exec($curl);			
			curl_close($curl);
			$instaData = json_decode($response);
			//print_r($instaData); die;
			$resultArray = [];
			if(isset($instaData->data)){
				foreach($instaData->data as $key => $single){
					$imageURL = isset($single->thumbnail_url) ? $single->thumbnail_url : $single->media_url;
					$resultArray[$key]['thumbnail_url'] = $imageURL;
					$resultArray[$key]['permalink'] = $single->permalink;
					$resultArray[$key]['image_url'] = env('APP_URL').'api/get/image/250/250/'.base64_encode(base64_encode($imageURL));				
				}
			}
			return view('/pages/index',compact('project','images','masterPlan','unitPlan','gallery','more_products','mainAmenities','events','user_review','unitPlan2','resultArray'));
		}
    }
	
	#admin dashboard page
    public function aboutUs(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 3,'status'=>1))->first();
		$innerPage2 = self::$InnerPages->where(array('id' => 4,'status'=>1))->first();
		$innerPage3 = self::$InnerPages->where(array('id' => 5,'status'=>1))->first();
		$banners = self::$Banners->where(array('status' => 1,'Page' => 'About Us'))->get();
		$awards = self::$Awards->where(array('status' => 1,'status'=>1))->get();

        return view('/pages/about_us',compact('innerPage','innerPage2','innerPage3','banners','awards'));
    }

	#admin dashboard page
    public function ourTeam(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 6,'status'=>1))->first();
		$team = self::$OurTeam->where('status',1)->get();
		$openings = self::$OurOpening->where('status',1)->get();

        return view('/pages/our_team',compact('team','innerPage','openings'));
    }
	
	#admin dashboard page
    public function blog(Request $request,$slug = NULL){
		if(empty($slug)){
			$innerPage = self::$InnerPages->where(array('id' => 7,'status'=>1))->first();
			$blogs = self::$Blogs->where('status',1)->where('type','blog')->latest()->paginate(15);
			$latest_blog = self::$Blogs->where('status',1)->where('type','blog')->latest()->first();

			return view('/pages/blog',compact('innerPage','blogs','latest_blog'));
		}else{
			$innerPage = self::$InnerPages->where(array('id' => 6,'status'=>1))->first();
			$blog = self::$Blogs->where('status',1)->where('type','blog')->where('slug',$slug)->first();
			if(isset($blog->id)){
				self::$Blogs->where(array('id' => $blog->id))->update(['views' => $blog->views+1]);
				$latest_blogs = self::$Blogs->where('status',1)->where('type','blog')->where('id','!=',$blog->id)->latest()->limit(3)->get();
				return view('/pages/blog_details',compact('innerPage','blog','latest_blogs'));
			}else{
				return redirect('blogs');
			}
		}
    }
	
	#admin dashboard page
    public function eventDetails(Request $request,$slug = NULL){
		if(!empty($slug)){
			$event = self::$Blogs->where('status',1)->where('type','event')->where('slug',$slug)->first();
			if(isset($event->id)){
				$event_images = self::$EventImages->where('status',1)->where('gallery_id',$event->id)->get();
				return view('/pages/event_details',compact('event','event_images'));
			}else{
				return redirect('/');
			}
		}
    }

	#admin dashboard page
    public function contactUs(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 1,'status'=>1))->first();
		$toll_free = self::$TollFree->where('status',1)->latest()->get();
		$setting = self::$Settings->where(array('id' => 1))->first();
		$tid = 0;
		foreach($toll_free as $key => $tcontact){
			$tid = $tcontact->id;
			break;
		}
        return view('/pages/contact_us',compact('innerPage','toll_free','setting','tid'));
    }
	
	#news
    public function news(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 9,'status'=>1))->first();
        return view('/pages/news',compact('innerPage'));
    }
	
	#termsAndConditions
    public function termsAndConditions(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 8,'status'=>1))->first();
		$faqs = self::$Faqs->where(array('type' => 'Terms & Conditions','status'=>1))->latest()->get();

        return view('/pages/terms_conditions',compact('innerPage','faqs'));
    }
	#virtualTour
    public function virtualTour(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 8,'status'=>1))->first();
		$faqs = self::$Faqs->where(array('type' => 'Terms & Conditions','status'=>1))->latest()->get();

        return view('/pages/virtual_tour',compact('innerPage','faqs'));
    }
	
	#termsAndConditions
    public function innerPages(Request $request,$slug = NULL){
		if($slug != ''){
			$innerPage = self::$InnerPages->where(array('slug' => $slug,'status'=>1))->first();
			if(isset($innerPage->id)){
        		return view('/pages/inner_pages',compact('innerPage'));
			}else{
				return redirect('/');	
			}
		}else{
			return redirect('/');
		}
    }
	
	#termsAndConditions
    public function privacyPolicy(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 2,'status'=>1))->first();
        return view('/pages/privacy_policy',compact('innerPage'));
    }
	
	#projects
    public function projects(Request $request){
		$innerPage = self::$InnerPages->where(array('id' => 10,'status'=>1))->first();
		$category = self::$Category->where(array('status'=>1))->pluck('title','id');
		$product_city = self::$Products->select('city_id')->where(array('status'=>1))->groupBy('city_id')->get();
		$city_array = array();
		foreach($product_city as $key => $city){
			$city = self::$City->where(array('status'=>1,'id'=>$city->city_id))->first();
			$city_array[$key]['id'] = $city->id;
			$city_array[$key]['city'] = $city->city;
		}
        return view('/pages/projects',compact('innerPage','category','city_array'));
    }

	#admin dashboard page
    public function product(Request $request,$slug = NULL){
		if(!empty($slug)){
			$project = self::$Products->where('status',1)->where('slug',$slug)->first();
			if(isset($project->id)){
				$masterPlan = self::$ProductImages->where('status',1)->where('type','Master Plan')->where('product_id',$project->id)->first();
				$unitPlan = self::$ProductImages->where('status',1)->where('type','Unit Plan')->where('product_id',$project->id)->get();
				$images = self::$ProductImages->where('status',1)->where('type','Banner')->where('product_id',$project->id)->get();
				$gallery = self::$ProductImages->where('status',1)->where('type','Gallery')->where('product_id',$project->id)->limit(5)->get();
				$more_products = self::$Products->where('status',1)->where('id','!=',3)->where('id','!=',$project->id)->limit(3)->get();							
				$mainAmenities = self::$ProductImages->where('status',1)->where('type','Main Amenities')->where('product_id',$project->id)->get();

				return view('/pages/product',compact('project','images','masterPlan','unitPlan','gallery','more_products','mainAmenities'));
			}else{
				return redirect('projects');
			}
		}else{
			return redirect('projects');
		}
		return view('/pages/our_team',compact('team','innerPage','openings'));
    }
	
	public function amenities(Request $request,$slug = NULL){
		$innerPage = self::$InnerPages->where(array('id' => 10,'status'=>1))->first();	
		$project = [];
		if(!empty($slug)){
			$project = self::$Products->where('status',1)->where('slug',$slug)->first();
			if(isset($project->id)){
				$types = array('Other Amenities');
				$maxtype = implode(',',$types);
				$mainAmenities = self::$ProductImages->where('status',1)->whereRaw('FIND_IN_SET(type,"'.$maxtype.'")')->where('product_id',$project->id)->get();
			}else{
				return redirect('/');
			}
		}else{
			$types = array('Main Amenities','Other Amenities');
			$maxtype = implode(',',$types);
			$mainAmenities = self::$ProductImages->where('status',1)->whereRaw('FIND_IN_SET(type,"'.$maxtype.'")')->get();
			return redirect('/');
		}
		return view('/pages/amenities',compact('innerPage','mainAmenities','project'));
	}
	
	public function gallery(Request $request,$slug = NULL,$folder = NULL){
		/*
		$innerPage = self::$InnerPages->where(array('id' => 10,'status'=>1))->first();
		$types = array('Gallery');
		$maxtype = implode(',',$types);
		if(!empty($slug)){
			$project = self::$Products->where('status',1)->where('slug',$slug)->first();
			if(isset($project->id)){
				$gallery = self::$ProductImages->where('status',1)->whereRaw('FIND_IN_SET(type,"'.$maxtype.'")')->where('product_id',$project->id)->get();
			}else{
				return redirect('/');	
			}
		}else{			
			$gallery = self::$ProductImages->where('status',1)->whereRaw('FIND_IN_SET(type,"'.$maxtype.'")')->get();
		}
		return view('/pages/gallery',compact('innerPage','gallery','project'));
		*/
		$innerPage = self::$InnerPages->where(array('id' => 10,'status'=>1))->first();
		$gallery = NULL;
		if(!empty($slug)){
			$project = self::$Products->where('status',1)->where('slug',$slug)->first();
			if(isset($project->id)){
				
			}else{
				return redirect('/');	
			}
		}else{			
			return redirect('/');	
		}		
		if(!empty($folder)){
			$gallery = self::$Galleries->where('status',1)->where('category_slug',$folder)->where('product_id',$project->id)->latest()->get();	
			$cat_array = array('highlights','landscape','houses','amenities');
			if(!in_array($folder,$cat_array)){
				return redirect('/');
			}
		}		
		return view('/pages/gallery',compact('innerPage','slug','project','folder','gallery'));
	}
	
	public function siteMap(){
		$innerPage = self::$InnerPages->where(array('id' => 29,'status'=>1))->first();
		return view('/pages/sitemap',compact('innerPage'));	
	}

}