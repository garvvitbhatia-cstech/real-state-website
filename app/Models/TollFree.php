<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TollFree extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	 
	protected $table = 'toll_free';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "country",
        "state",
		"city",
		"flag",
		"contact",
        "address",
        "time",
        "status"
    ];

    protected $UpdatableFields = [
        "country",
        "state",
		"city",
		"flag",
		"contact",
        "address",
        "time",
        "status"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
	public function GetRecordById($id){
		return $this::where('id', $id)->first();
	}
	public function UpdateRecord($Details){
		$Record = $this::where('id', $Details['id'])->update($Details);
		return true;
	}
	public function CreateRecord($Details){
		$Record = $this::create($Details);
		return $Record;
	}

    public function ExistingRecord($country){
		return $this::where('country',$country)->where('status','!=', 3)->exists();
	}
	public function ExistingRecordUpdate($country, $id){
		return $this::where('country',$country)->where('id','!=', $id)->where('status','!=', 3)->exists();
	}

}