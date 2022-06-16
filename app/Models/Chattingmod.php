<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chattingmod extends Model
{
    use HasFactory;
    protected $table = 'chattingmods';
        protected $fillable = [
           'room','sender_id','reciever_id','message','user_id'];
         protected $dates = ['deleted_at'];
          public function using(){
            return $this->belongsTo('App\Models\User', 'user_id', 'id');
        }
             public function sending(){
             	return $this->belongsTo('App\Models\User', 'sender_id', 'id');
            }
            
             public function recieving(){
               return $this->belongsTo('App\Models\User', 'reciever_id', 'id');
              }
}
