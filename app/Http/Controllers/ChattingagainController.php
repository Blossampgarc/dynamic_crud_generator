<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chattingmod;
use Auth;
class ChattingagainController extends Controller
{
     public function chatting_again()
    {
        $data = Chattingmod::where('sender_id',Auth::user()->id)->where('reciever_id','!=','')->get();
    $user = User::all();
    return view('layouts.chatting_again')->with(compact('user','data'));
     
    }

    public function opening_chat(Request $request)
    {
    	 $id = $request->reciever_id;
      $room = $request->room;
      $data2 = User::where('id',$id)->first();
      $data = Chattingmod::where('room',$room)->get();
      // dd($data);
     $melin = '';
     $melin.= '<div class="header-chat">
                <i class="icon fa fa-user-o" aria-hidden="true"></i>
                <p class="name">'.$data2->name.'</p>
                <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
            </div>
            <div class="ring">';
            foreach($data as $p){
          $melin.=  '<div class="messages-chat">';
                if($p->reciever_id == Auth::user()->id ){
                $melin.='<div class="message">
                    <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                        <div class="online"></div>
                    </div>
                    <p class="text">'.$p->message.'</p>
                </div>';
                }
                  if($p->sender_id == Auth::user()->id ){
              $melin.=  '<div class="message text-only">
                    <div class="response">
                        <p class="text">'.$p->message.'</p>
                    </div>
                </div>';
            }
          $melin.=  '</div>';
        }
        $melin.=  '</div>';
         return response()->json(['body' => $melin]);
    }
      public function create_chatting_again(Request $request)
    {
    	// dd($request->reciever_id);
        Chattingmod::create($request->all());
        return true;
    }
    public function call_chat(Request $request)
    {
    	$sender =Auth::user()->id;
    	$id = $request->reciever_id;
    	$data2 = User::where('id',$id)->first();
      $room = $request->room;
      $user = User::all();
      $data = Chattingmod::where('sender_id',Auth::user()->id)->where('reciever_id',$id)->get();
      // dd($id,$room);
      $arr = array('id'=> $id,'room'=>$room);
      return response()->json(['arr' => $arr]);
      // return view('layouts.chatting_again')->with(compact('id','room','user','data','data2'));
    }

     public function fetchingt(Request $request)
    {
      $room = $request->room;
       
$data = Chattingmod::where('room',$room)->get();
       // dd($data);
        $link = '';
    foreach($data as $p){
    	if($p->reciever_id == Auth::user()->id ){
      $link.= '   <div class="message">
                    <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                        <div class="online"></div>
                    </div>
                    <p class="text">{{$p->message}}</p>
                </div>';
                }
                  if($p->sender_id == Auth::user()->id ){
             $link.=' <div class="message text-only">
                    <div class="response">
                        <p class="text">{{$p->message}}</p>
                    </div>
                </div>
               
                ';
            }
                        }
        return response()->json(['body' => $link]);
    }

}
