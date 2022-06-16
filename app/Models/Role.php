<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RolePermission;

class Role extends Model
{
    use HasFactory;
      protected $table = 'roles';
        protected $fillable = [
           'role_name' 
        ];
        public function role_detail($id)
     {

    return $this->hasMany(RolePermission::class);
      }
}
