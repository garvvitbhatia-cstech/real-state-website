<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TollFree;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
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

class TollFreeController extends Controller
{
	private static $TollFree;
    private static $TokenHelper;
	private static $Country;
	private static $State;
	private static $City;

	public function __construct(){
		self::$TollFree = new TollFree();
        self::$TokenHelper = new TokenHelper();
		self::$Country = new Country();
		self::$State = new State();
		self::$City = new City();
	}

    #admin dashboard page
    public function getList(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$cityList = self::$City->where(array('status' => 1,'state_id' => 33))->orderBy('city')->pluck('city','id');
		
		return view('/admin/toll_free/index',compact('cityList'));
    }
    public function listPaginate(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
        $query = self::$TollFree->where('status', '!=', 3);

		if($request->input('city')  && $request->input('city') != ""){
            $city = $request->input('city');
            $query->where('city', 'like', '%'.$city.'%');
		}
		$records =  $query->orderBy('id', 'DESC')->simplePaginate(20);
        return view('/admin/toll_free/paginate',compact('records'));
    }

    #add new Service Type
    public function addPage(Request $request){
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		if($request->input()){
			$validator = Validator::make($request->all(), [
				'country' => 'required',
				'state' => 'required',
				'city' => 'required',
				'flag' => 'required',
				'contact' => 'required',
				'from' => 'required',
				'to' => 'required',
				'address' => 'required',
            ],[
				'country.required' => 'Please enter country.',
				'state.required' => 'Please enter state.',
				'city.required' => 'Please enter city.',
				'flag.required' => 'Please enter flag image.',
				'contact.required' => 'Please enter contact.',
				'from.required' => 'Please enter from.',
				'to.required' => 'Please enter to.',
				'address.required' => 'Please enter address.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('country')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('country')));die;
				}
				if($errors->first('state')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('state')));die;
				}
				if($errors->first('city')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('city')));die;
				}
				if($errors->first('flag')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('flag')));die;
				}
				if($errors->first('contact')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('contact')));die;
				}
				if($errors->first('from')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('from')));die;
				}
				if($errors->first('to')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('to')));die;
				}
				if($errors->first('address')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('address')));die;
				}
			}else{
				$setData['country'] = $request->input('country'); 
				$setData['state'] = $this->builtSlug($request->input('state'));
				$setData['city'] = $request->input('city');
				$setData['contact'] = $request->input('contact');
				$setData['address'] = $request->input('address');
				$setData['time'] = $request->input('from').'-'.$request->input('to');
				
				if(isset($request->flag) && $request->flag->extension() != ""){
					$validator = Validator::make($request->all(), [
						'flag' => 'required|image|mimes:jpeg,png,webp,jpg|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('flag')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('flag')).'.'.$request->flag->extension());
						$destination = base_path().'/public/img/blogs/';
						$request->flag->move($destination, $actual_image_name);
						$setData['flag'] = $actual_image_name;
					}
				}				
				$record = self::$TollFree->CreateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Toll Free added successfully'));die;
			}
		}
		$country_list = $this->countryList();
		return view('/admin/toll_free/add-page',compact('country_list'));
    }

    #edit Service Type
    public function editPage(Request $request, $row_id){
		$RowID =  base64_decode($row_id);
		if(!$request->session()->has('admin_email')){return redirect('/admin/');}
		$rowData = self::$TollFree->where(array('id' => $RowID))->first();		

        if($request->input()){
			$validator = Validator::make($request->all(), [
				'country' => 'required',
				'state' => 'required',
				'city' => 'required',
				'contact' => 'required',
				'from' => 'required',
				'to' => 'required',
				'address' => 'required',
            ],[
				'country.required' => 'Please enter country.',
				'state.required' => 'Please enter state.',
				'city.required' => 'Please enter city.',
				'contact.required' => 'Please enter contact.',
				'from.required' => 'Please enter from.',
				'to.required' => 'Please enter to.',
				'address.required' => 'Please enter address.',
            ]);
			if($validator->fails()){
				$errors = $validator->errors();
				if($errors->first('country')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('country')));die;
				}
				if($errors->first('state')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('state')));die;
				}
				if($errors->first('city')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('city')));die;
				}
				if($errors->first('contact')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('contact')));die;
				}
				if($errors->first('from')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('from')));die;
				}
				if($errors->first('to')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('to')));die;
				}
				if($errors->first('address')){
                    return json_encode(array('heading'=>'Error','msg'=>$errors->first('address')));die;
				}
			}else{
				$setData['id'] =  $RowID;
				$setData['country'] = $request->input('country'); 
				$setData['state'] = $this->builtSlug($request->input('state'));
				$setData['city'] = $request->input('city');
				$setData['contact'] = $request->input('contact');
				$setData['address'] = $request->input('address');
				$setData['time'] = $request->input('from').'-'.$request->input('to');

				if(isset($request->flag) && $request->flag->extension() != ""){
					$validator = Validator::make($request->all(), [
						'flag' => 'required|image|mimes:jpeg,webp,png,jpg|max:2048'
					]);
					if($validator->fails()){
						$errors = $validator->errors();
						return json_encode(array('heading'=>'Error','msg'=>$errors->first('flag')));die;
					}else{
						$actual_image_name = strtolower(sha1(str_shuffle(microtime(true).mt_rand(100001,999999)).uniqid(rand().true).$request->file('image')).'.'.$request->flag->extension());
						$destination = base_path().'/public/img/blogs/';
						$request->flag->move($destination, $actual_image_name);
						$setData['flag'] = $actual_image_name;
						if($request->input('old_image') != ""){
							if(file_exists($destination.$rowData->flag)){
								unlink($destination.$rowData->flag);
							}
						}
					}
				}
				self::$TollFree->UpdateRecord($setData);                
                echo json_encode(array('heading'=>'Success','msg'=>'Toll Free updated successfully'));die;
			}
		}
		
        if(isset($rowData->id)){
			$country_list = $this->countryList();
            return view('/admin/toll_free/edit-page',compact('rowData','row_id','country_list'));
        }else{
            return redirect('/admin/toll-free');
        }
    }
	
	#country
	public function countryList(){
		return self::$Country->where(array('status' => 1))->pluck('country_name','id');	
	}
	
	
}