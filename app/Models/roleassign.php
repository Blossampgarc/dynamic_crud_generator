<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

    class  roleassign extends Model
    {
        use HasFactory,SoftDeletes;

        protected $table = 'roleassigns';
        protected $fillable = [
           'assignee','role_id' 
        ];

         public function users(){
            return $this->belongsTo('App\Models\User', 'user_id', 'id');
        }
      protected $dates = ['deleted_at'];
    }
     