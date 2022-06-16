<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class main extends Model
{
    use HasFactory;
    protected $table = 'mains';
    protected $fillable = ['name',
            'field_name', 'field_type'];

     public function users(){
       return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
