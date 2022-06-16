<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategoryies extends Model
{
    use HasFactory;
      protected $table = 'child_categoryies';
        protected $fillable = [
           'role_id','permission_id' 
        ];
 public function subcategory(){
        return $this->belongsTo(SubCategories::class);
    }
}
