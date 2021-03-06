<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\permission;

class RolePermission extends Model
{
    use HasFactory;
      protected $table = 'role_permissions';
        protected $fillable = [
           'role_id','permission_id' 
        ];
 public function role(){
        return $this->belongsTo(Role::class);
    }
     public function permission(){
        return $this->belongsTo(permission::class);
    }
}
