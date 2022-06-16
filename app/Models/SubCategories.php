<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ChildCategoryies;
class SubCategories extends Model
{
    use HasFactory;
        protected $table = 'subCategories';
        protected $fillable = [
           'role_id','permission_id' 
        ];
      public function childcategory($id)
     {
    return $this->hasMany(ChildCategoryies::class);
      }
     public function category(){
        return $this->belongsTo(Category::class);
    }
    
}
