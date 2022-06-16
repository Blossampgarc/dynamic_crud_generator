<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

    class  race extends Model
    {
        use HasFactory,SoftDeletes;

        protected $table = 'races';
        protected $fillable = [
           'racer_name','image','phone_number' 
        ];

         public function users(){
            return $this->belongsTo('App\Models\User', 'user_id', 'id');
        }
      protected $dates = ['deleted_at'];
    }
     