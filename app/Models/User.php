<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Chatit;
use App\Models\Chattingmod;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function userd()
      {
        return $this->hasMany('App\Models\Chatit', 'user_id','id');
      }
       public function senderd()
      {
        return $this->hasMany('App\Models\Chatit', 'sender_id','id');
      }
       public function recieverd()
      {
        return $this->hasMany('App\Models\Chatit', 'reciever_id','id');
      }

      public function get_room($logged_in , $chat_with)
      {
        
        //dd($logged_in, $chat_with);
        $room  = Chatit::where("sender_id" , $logged_in)->where("reciever_id" ,$chat_with)->orWhere("reciever_id" , $logged_in)->where("sender_id" , $chat_with)->first();
        $room_id ='';
        

        if($room){

            $room_id = $room->room;
            // dd($room_id);
        }else{
            $room_id = rand(1000, 9999);
        }
        // dd($room_id);
        // if ($chat_with == 3) {
        //   dd($room,$room_id);
        // }
        return $room_id;
      }



       public function geting_room($logged_in , $chat_with)
      {
        
        //dd($logged_in, $chat_with);
        $rooming  = Chattingmod::where("sender_id" , $logged_in)->where("reciever_id" ,$chat_with)->orWhere("reciever_id" , $logged_in)->where("sender_id" , $chat_with)->first();
        $room_iding ='';
        

        if($rooming){

            $room_iding = $rooming->room;
            // dd($room_id);
        }else{
            $room_iding = rand(1000, 9999);
        }
        // dd($room_iding);
        // if ($chat_with == 3) {
        //   dd($room,$room_id);
        // }
        return $room_iding;
      }
}
