<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class InnerPages extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'inner_pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "title",
		"slug",
		"description",
		"banner",
		"banner_status",
		"heading",
		"sub_heading",
		"seo_title",
		"seo_description",
		"seo_keyword",
		"robot_tags",
        "status"
    ];

    protected $UpdatableFields = [
       	"title",
		"slug",
		"description",
		"banner",
		"banner_status",
		"heading",
		"sub_heading",
		"seo_title",
		"seo_description",
		"seo_keyword",
		"robot_tags",
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

}