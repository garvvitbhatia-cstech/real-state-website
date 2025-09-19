<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Newsletter;
use App\Models\OurTeam;
use App\Models\Contact;
use App\Models\TokenHelper;
use App\Models\User;
use App\Models\Orders;
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
use App\Http\Controllers\Admin\GeneralController;

class ExportController extends Controller{

	private static $Category;
	private static $Contact;
	private static $Products;
	private static $OurTeam;
	private static $Newsletter;
	
	public function __construct(){
		self::$Category = new Category();
		self::$Products = new Products();
		self::$Contact = new Contact();
		self::$OurTeam = new OurTeam();
		self::$Newsletter = new Newsletter();
	}
	#exportProduct
    public function exportProduct(Request $request){
		if(!$request->session()->has('admin_email')){ echo 'SessionExpired'; die; }
        //$query = self::$Products->where('status', '!=', 3);
		$admin_type = $request->session()->get('admin_type');
		$admin_id = $request->session()->get('admin_id');	
		$query = self::$Products->join('categories','categories.id','=','products.category_id')
		->leftJoin('cities','cities.id','=','products.city_id')
		->select(['products.*','categories.title as category_name','cities.city as city_name'])
		->where('products.status', '!=', 3)
		->where('products.id', '!=', 3);

		if($request->input('product_name')  && $request->input('product_name') != ""){
            $SearchKeyword = $request->input('product_name');
            $query->where('products.product_name', 'like', '%'.$SearchKeyword.'%')
                    ->orWhere('products.product_code', 'like', '%'.$SearchKeyword.'%')
                    ->orWhere('categories.title', 'like', '%'.$SearchKeyword.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->get();

		$delimiter = ",";
		$filename = "products_" . date('d_F_Y') . ".csv";
		
		$destination = "storage/csv/".$filename;
		//create a file pointer
		$f = fopen($destination,"w");
		
		//set column headers
		$fields = array(
						'S.No', 
						'Title',
						'Category',
						'City',
						'Type',
						'Property Status',
						'Price',
						'Possession Date',
						'Address',
						'Location',
						'Description',
						'SEO Title',
						'SEO Keywords',
						'SEO Description',
						'SEO Robots',
						'Status',
						'Created'
						);
		 
		fputcsv($f, $fields, $delimiter);
		foreach($records as $key => $record):
			if($record->status == 1){
				$status = 'Active';
			}else{
				$status = 'Inactive';
			}
			$lineData = array(
							$key+1,
							$record->title,
							$record->category_name,
							$record->city_name,
							$record->type,
							$record->property_status,
							$record->price,
							$record->possession_date,
							$record->address,
							$record->location,
							$record->description,
							$record->seo_title,
							$record->seo_description,
							$record->seo_keyword,
							$record->robot_tags,
							$status,
							$record->created_at,                           
						);
			fputcsv($f, $lineData, $delimiter);
		endforeach;
		$lineData2 = array('','');						
		fputcsv($f, $lineData2, $delimiter);                     
		
		fclose ($f);

		echo env('APP_URL').$destination;		
		exit;
    }

	#exportReview
    public function exportCategory(Request $request){
		
		if(!$request->session()->has('admin_email')){ echo 'SessionExpired'; die; }
        $query = self::$Category->where('status', '!=', 3);
		if($request->input('title')  && $request->input('title') != ""){
            $SearchKeyword = $request->input('title');
            $query->where('title', 'like', '%'.$SearchKeyword.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->get();		

		$delimiter = ",";
		$filename = "categories_" . date('d_F_Y') . ".csv";
		
		$destination = "storage/csv/".$filename;
		//create a file pointer
		$f = fopen($destination,"w");
		
		//set column headers
		$fields = array(
						'S.No', 
						'Title',
						'Description',
						'SEO Title',
						'SEO Description',
						'SEO Keyword',
						'Robot Tags',
						'Status',
						'Created'
						);
		 
		fputcsv($f, $fields, $delimiter);
		foreach($records as $key => $record):
			$status = '';
			if($record->status == 1){
				$status = 'Active';
			}
			if($record->status == 2){
				$status = 'Inactive';
			}
			$lineData = array(
							$key+1,
							$record->title,
							$record->description,
							$record->seo_title,
							$record->seo_description,
							$record->seo_keyword,
							$record->robot_tags,
							$status,
							$record->created_at,                           
						);
			fputcsv($f, $lineData, $delimiter);
		endforeach;
		$lineData2 = array('','');						
		fputcsv($f, $lineData2, $delimiter);                     
		
		fclose ($f);

		echo env('APP_URL').$destination;		
		exit;
    }
	
	#exportEnquiry
    public function exportEnquiry(Request $request){
		
		if(!$request->session()->has('admin_email')){ echo 'SessionExpired'; die; }
        $query = self::$Contact->where('read_status', '!=', 3);
		if($request->input('read_status')  && $request->input('read_status') != ""){
            $read_status = $request->input('read_status');
            $query->where('read_status', $read_status);
		}
		$records =  $query->orderBy('id', 'DESC')->get();		

		$delimiter = ",";
		$filename = "enquiry_" . date('d_F_Y') . ".csv";
		
		$destination = "storage/csv/".$filename;
		//create a file pointer
		$f = fopen($destination,"w");
		
		//set column headers
		$fields = array(
						'S.No', 
						'Name',
						'Email',
						'Contact',
						'Subject',
						'Message',
						'Created'
						);
		 
		fputcsv($f, $fields, $delimiter);
		foreach($records as $key => $record):
			$lineData = array(
							$key+1,
							$record->name,
							$record->email,
							$record->sontact,
							$record->subject,
							$record->message,
							$record->created_at,                           
						);
			fputcsv($f, $lineData, $delimiter);
		endforeach;
		$lineData2 = array('','');						
		fputcsv($f, $lineData2, $delimiter);                     
		
		fclose ($f);

		echo env('APP_URL').$destination;		
		exit;
    }
	
	#exportEnquiry
    public function exportTeam(Request $request){
		
		if(!$request->session()->has('admin_email')){ echo 'SessionExpired'; die; }
        $query = self::$OurTeam->where('status', '!=', 3);
		if($request->input('read_status')  && $request->input('read_status') != ""){
            $read_status = $request->input('read_status');
            $query->where('read_status', $read_status);
		}
		$records =  $query->orderBy('id', 'DESC')->get();		

		$delimiter = ",";
		$filename = "team_" . date('d_F_Y') . ".csv";
		
		$destination = "storage/csv/".$filename;
		//create a file pointer
		$f = fopen($destination,"w");
		
		//set column headers
		$fields = array(
						'S.No', 
						'Name',
						'Designation',
						'Description',
						'Created'
						);
		 
		fputcsv($f, $fields, $delimiter);
		foreach($records as $key => $record):
			$lineData = array(
							$key+1,
							$record->name,
							$record->designation,
							$record->description,
							$record->created_at,                           
						);
			fputcsv($f, $lineData, $delimiter);
		endforeach;
		$lineData2 = array('','');						
		fputcsv($f, $lineData2, $delimiter);                     
		
		fclose ($f);

		echo env('APP_URL').$destination;		
		exit;
    }
	
	#exportEnquiry
    public function exportNewsletter(Request $request){
		
		if(!$request->session()->has('admin_email')){ echo 'SessionExpired'; die; }
        $query = self::$Newsletter->where('id', '!=', '');
		if($request->input('email')  && $request->input('email') != ""){
            $email = $request->input('email');
            $query->where('email', $email);
		}
		$records =  $query->orderBy('id', 'DESC')->get();		

		$delimiter = ",";
		$filename = "newsletter_" . date('d_F_Y') . ".csv";
		
		$destination = "storage/csv/".$filename;
		//create a file pointer
		$f = fopen($destination,"w");
		
		//set column headers
		$fields = array(
						'S.No', 
						'Email',
						'Created'
						);
		 
		fputcsv($f, $fields, $delimiter);
		foreach($records as $key => $record):
			$lineData = array(
							$key+1,
							$record->email,
							$record->created_at,                           
						);
			fputcsv($f, $lineData, $delimiter);
		endforeach;
		$lineData2 = array('','');						
		fputcsv($f, $lineData2, $delimiter);                     
		
		fclose ($f);

		echo env('APP_URL').$destination;		
		exit;
    }

}