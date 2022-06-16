<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SubCategories;

    class  Category extends Model
    {
        use HasFactory,SoftDeletes;

        protected $table = 'Categorys';
        protected $fillable = [
           'category_name','slug','parent_id' 
        ];

         public function users(){
            return $this->belongsTo('App\Models\User', 'user_id', 'id');
        }
          public function subcategories()
      {
        return $this->hasMany('App\Models\Category', 'parent_id','id');
      }

    //   public function subcategor($id)
    //  {

    // return $this->hasMany(SubCategories::class);
    //   }
      protected $dates = ['deleted_at'];
    }
     