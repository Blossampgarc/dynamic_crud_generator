@extends('layouts.chat_again') @section('content')
<div class="container">
    <div class="row">
        <section class="discussions">
            <div class="discussion search">
                <div class="searchbar">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Search..." />
                </div>
            </div>
            @foreach($user as $us)
            <div class="discussion">
             <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1435348773030-a1d74f568bc2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80);">
                    <div class="online"></div>
                </div>
                <?php   
                            $login = Auth::user()->id;
                             $get = $us->geting_room($login , $us->id);
                ?>
                <div class="desc-contact">
                    <p id="sideus" class="sideus" data-sideus="{{$us->id}}" data-room="{{$get}}" value="{{$us->id}}">{{$us->name}}</p>
                </div>
            </div>
            @endforeach
        </section>
        <section class="chat">
            <div class="thing">
            <div class="header-chat">
                <i class="icon fa fa-user-o" aria-hidden="true"></i>
                <p class="name">Megan Leib</p>
                <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
            </div>
            <div class="ring">
            @foreach($data as $p)
            <div class="messages-chat">
                @if($p->reciever_id == Auth::user()->id )
                <div class="message">
                    <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                        <div class="online"></div>
                    </div>
                    <p class="text">{{$p->message}}</p>
                </div>
                @endif
                  @if($p->sender_id == Auth::user()->id )
                <div class="message text-only">
                    <div class="response">
                        <p class="text">{{$p->message}}</p>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
            </div>
            <form class="you">
            <div class="footer-chat">
                <div class="input-group-prepend">
                <button type="button" id="it" name="it"><span class="input-group-text"><i class="fa fa-send" ></i></span></button>
                </div>
                <i class="icon fa fa-smile-o clickable" style="font-size: 25pt;" aria-hidden="true"></i>
                <input type="text" class="write-message" name="yourmessage" id="yourmessage" placeholder="Type your message here" />
                <i class="icon send fa fa-paper-plane-o clickable" aria-hidden="true"></i></div>
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            <input type="text" name="user_id" id="user_id" hidden="" value="{{Auth::user()->id}}" data-user="{{Auth::user()->id}}">
            <input type="text" name="sender_id" id="sender_id" hidden="" value="{{Auth::user()->id}}" hidden="">
           <input type="text" name="reciever_id" id="reciever_id" value="" hidden="">
            <input type="text" id="room" name="room" value="" hidden="">
           
            </form>
        </section>
    </div>
</div>
@endsection
