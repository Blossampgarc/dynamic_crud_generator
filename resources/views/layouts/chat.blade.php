<!DOCTYPE html>
<html lang="en">

<head>
 <!-- <meta http-equiv="refresh" content="2" /> -->
  @include('layouts.links')
<style type="text/css">
  body{

    background-color: #f4f7f6;
    margin-top:0px;
}
#plist{
    overflow-y: scroll;
    height: 500px;
}
.chat-history {
    overflow-y: scroll;
    height: 370px;
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
  
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
</head>

<body class="sidebar-dark">
  <div class="container-scroller">

  @include('layouts.header')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.sidebar')
     @yield('content')

    </div>

    @include('layouts.footer')

  </div>
@include('layouts.scripts')

<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<script type="text/javascript">
 // var dat = setTimeout(showdata,3000);
    $(document).ready(function() {
     $(".chat-history").animate({ scrollTop: $('.chat-history').prop("scrollHeight")}, 1000);
    $('#mitt').on('click', function() {
      var user_id = $('#user_id').val();
      var image = $('#image').val();
      var sender_id = "{{Auth::user()->id}}";
      console.log(sender_id);
      var reciever_id = "{{isset($data3)?$data3:'0'}}";
      var message = $('#message').val();
      var room = "{{isset($room)?$room:'0'}}";
     
      var  body = '<li class="clearfix"><div class="message other-message float-right"> '+message+' </div></li>';
      if(message!=""){
              $.ajax({
              url: "{{ route('create_chatting') }}",
              type: "POST",
              data: {
                  _token: "{{csrf_token()}}",
                  type: 1,
                  sender_id: sender_id,
                  reciever_id: reciever_id,
                  user_id: user_id,
                  message: message,
                  room: room
              },
              cache: false,
              success: function(dataResult){
                  // console.log(dataResult);
                  $("#message").val("");
                  $(".chat-box form").append(body);
                  $(".chat-history").animate({ scrollTop: $('.chat-history').prop("scrollHeight")}, 1000); 
              }
          });
      }
      else{
          alert('Please fill all the field !');
      }
  });
 
     function showdata(){
      // var room = $('#room').val();
      // let room = $(this).attr("data-room");
      var room = "{{isset($room)?$room:'0'}}";
      console.log(room);
      
      // let reciever_id = $(this).attr("data-usname");
              var reciever_id = $('#reciever_id').val();
              console.log(reciever_id);
              var sender_id = $('#sender_id').val();
            $.ajax({
            url: "{{ route('fetchchatting') }}",
            method: "GET",
            dataType: "JSON",
            data: {room:room , reciever_id:reciever_id},
            success:function(data){
          $('#there').html(data.body);
          $("#there").show();
        }
    })  
            }
            showdata();
            setInterval(function(){
              
                showdata();
            
            

            }, 3000);


     $('.usname').on('click', function(e){
    console.log("Edit button clicked")
    let reciever_id = $(this).attr("data-usname");
  var user_id = $('#user_id').val();
  console.log(reciever_id);
      var image = $('#image').val();
      var sender_id = "{{Auth::id()}}";
      console.log(sender_id);
      var message = $('#message').val();
      //var room = "{{isset($room)?$room:'0'}}";
      var room = $(this).data("room");
      console.log(room);
       $.ajax({
            url: "{{ route('openchat') }}",
            method: "GET",
            dataType: "JSON",
            data: {room:room , reciever_id:reciever_id },
            success:function(data){
            console.log(data);
          $('.chat').html(data.body);
          $('.chat').show();
        }
    })
   })
});
</script>
<script type="text/javascript">
    

</script>
</body>
</html>

