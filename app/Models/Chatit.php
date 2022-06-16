<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatit extends Model
{
    use HasFactory;
    protected $table = 'chatits';
        protected $fillable = [
           'room','sender_id','reciever_id','message','user_id','image'];
         protected $dates = ['deleted_at'];
          public function users(){
            return $this->belongsTo('App\Models\User', 'user_id', 'id');
        }
             public function sender(){
             	return $this->belongsTo('App\Models\User', 'sender_id', 'id');
            }
            
             public function reciever(){
               return $this->belongsTo('App\Models\User', 'reciever_id', 'id');
              }
}
