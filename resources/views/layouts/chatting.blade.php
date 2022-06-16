@extends('layouts.chat') @section('content')
<div class='content-body'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            @foreach($user as $us)
                            <li class="clearfix">
                             <?php  
                             $login = Auth::user()->id;
                             $get = $us->get_room($login , $us->id);
// href="{{route('fetch_chats',[$get,$us->id])}}"
                                // $data3 = $us->id;
                                // dd($us->id);
                                ?>
                                <div class="about">
                                <div id="usname" class="usname" data-usname="{{$us->id}}" data-room="{{$get}}" value="{{$us->id}}">{{$us->name}}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                
                    <div class="chat33">
                        <div class="chat">
                             @isset($data3)
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                 <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                   </a>

                                    <div class="chat-about">
                                        <h6 class="m-b-0">{{$data2->name}}</h6>
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

                            <ul class="m-b-0 chat-box ">
                                
                                @foreach($data as $p)
                                     @if($p->sender_id == Auth::user()->id )
                                    <!-- right start -->
                                    <li class="clearfix">
                                        <div class="message other-message float-right"> {{$p->message}} </div>
                                    </li>
                                    <!-- right end-->
                                    @endif @if($p->reciever_id == Auth::user()->id )
                                    <!-- left start-->
                                    <li class="clearfix">
                                        <div class="message-data text-right">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                            <span class="message-data-time text-left">{{$p->senttime}}</span>
                                        </div>
                                        <div class="message my-message">{{$p->message}}</div>
                                    </li>
                                    <!-- left end-->
                                    @endif 
                                @endforeach
                            </ul>
                        </div>
                        </div>
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <form enctype="multipart/form-data">
                                <div class="input-group-prepend">
                                    <button type="button" id="mitt" name="mitt"><span class="input-group-text"><i class="fa fa-send"></i></span></button>
                                </div>

                                <input type="text" class="form-control" name="message" id="message" placeholder="Enter text here...">
                                @endisset
                                <!-- <input type="file" class="form-control" name="image" id="image"> -->
                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                <input type="text" name="user_id" id="user_id" hidden="" value="{{Auth::user()->id}}" data-user="{{Auth::user()->id}}">
                                <input type="text" name="sender_id" id="sender_id" hidden="" value="{{Auth::user()->id}}">
                                @isset($data3)
                                <input type="text" name="reciever_id" id="reciever_id" data-id="{{$data3}}" hidden="" value="{{$data3}}" >
                                @endisset
                                @isset($room)
                                <input type="text" id="room" name="room" hidden="" data-room="{{$get}}" value="{{$room}}">
                                @endisset
                                </form>
                            </div>
                        </div>
                        
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection