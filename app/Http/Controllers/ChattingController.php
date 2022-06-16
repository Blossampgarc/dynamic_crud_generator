<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chatit;
use App\Models\User;
use Auth;
use Session;

class ChattingController extends Controller
{
      public function chatting($room = '')
    {
      $det  = Chatit::where('sender_id',Auth::user()->id)->get();
    $data = Chatit::where('sender_id','!=','')->where('reciever_id','!=','')->get();
      $data2 = Chatit::where('reciever_id',Auth::user()->id)->first();
      // $data2 = Chatit::where('reciever_id',$id)->first();
      // dd($data2);
       $dataing = Chatit::where('room',$room)->get();
    $user = User::all();
      return view('layouts.chatting')->with(compact('det','data','data2','user','dataing'));
     
    }

    public function create_chatting(Request $request)
    {

        Chatit::create($request->all());
        return true;
    }
 public function show_chatting(Request $request)
    {
      return redirect()->back()->with(compact('messaging'));
    }	

    public function fetchchatting(Request $request)
    {
      $room = $request->room;
       
       // $data = Chatit::where('reciever_id',$reciever)->where('sender_id',Auth::user()->id)->get();
$data = Chatit::where('room',$room)->get();
       // dd($data);
        $htmlin = '';
    foreach($data as $p){
    if($p->sender_id == Auth::user()->id ) {
         $htmlin .= '<!-- right start -->
                               <li class="clearfix">
                            <div class="message other-message float-right"> '.$p->message.'
                            </li>
                            <!-- right end-->';
                            }
                    elseif($p->reciever_id == Auth::user()->id ){
                $htmlin .='<!-- left start-->
                        <li class="clearfix">
                           <div class="message-data text-right">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                 <span class="message-data-time text-left">'.$p->senttime.'</span> 
                            </div>
                            <div class="message my-message">'.$p->message.'</div>
                        </li> 
                        <!-- left end-->';
                        }
                        }
                         return response()->json(['body' => $htmlin]);
    }

    public function openchat(Request $request)
    {
       $id = $request->reciever_id;
      $room = $request->room;
      $data = Chatit::where('room',$room)->get();
      // $room = Chatit::select('room')->where('reciever_id',$id)->where('sender_id',Auth::user()->id)->orWhere('sender_id',$id)->where('reciever_id',Auth::user()->id)->first();
      // dd($data);
     $data2 = User::where('id',$id)->first();
      $ellin= '';
      $ellin.= '<div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                 <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                   </a>

                                    <div class="chat-about">
                                        <h6 class="m-b-0">'.$data2->name.'</h6>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 hidden-sm text-right">
                                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="chat-history" id="there">

                            <ul class="m-b-0 chat-box ">';
                                
                          foreach($data as $p){
                          if($p->sender_id == Auth::user()->id ){
                         $ellin.=' <!-- right start -->
                                    <li class="clearfix">
                                        <div class="message other-message float-right"> '.$p->message.' </div>
                                    </li>
                                    <!-- right end-->';
                                    }
                    if($p->reciever_id == Auth::user()->id ){
                                $ellin.='<!-- left start-->
                                    <li class="clearfix">
                                        <div class="message-data text-right">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                            <span class="message-data-time text-left">'.$p->senttime.'</span>
                                        </div>
                                        <div class="message my-message">'.$p->message.'</div>
                                    </li>
                                    <!-- left end-->';
                                    } 
                               }
                           $ellin.=' </ul>
                        </div>';
                        return response()->json(['body' => $ellin]);
    }

    public function fetch_chats(Request $request,$room = '',$id)
    {
      $data = Chatit::where('room',$room)->get();
      // dd($data);
      $det  = Chatit::where('sender_id',Auth::user()->id)->first();
       $data2 = User::where('id',$id)->first();
      // dd($id);
      $data3 = $id;
      // dd($data2);
    $user = User::all();
      return view('layouts.chatting')->with(compact('data','data2','user','room','det','data3'));
    }
}

