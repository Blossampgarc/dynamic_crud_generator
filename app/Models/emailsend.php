<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class emailsend extends Model
{
    use HasFactory,SoftDeletes;
      protected $table = 'emailsends';
        protected $fillable = [
           'name','email','message' 
        ];

        
      protected $dates = ['deleted_at'];
    }

