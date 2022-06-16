<!DOCTYPE html>
<html lang="en">

<head>
 <!-- <meta http-equiv="refresh" content="2" /> -->
  @include('layouts.links')
<style type="text/css">
body {
  padding: 0%;
  background-color: #F5F5F5;
}

.container {
  padding:0;
  background-color: #FFF; 
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  height: 700px;
}
/* ===== MENU ===== */
.menu {
  float: left;
  height: 700px;;
  width: 70px;
  background: #4768b5;
  background: -webkit-linear-gradient(#4768b5, #35488e);
  background: -o-linear-gradient(#4768b5, #35488e);
  background: -moz-linear-gradient(#4768b5, #35488e);
  background: linear-gradient(#4768b5, #35488e);
  box-shadow: 0 10px 20px rgba(0,0,0,0.19);
}
.ring {
    overflow-y: scroll;
    height: 430px;
}

.menu .items {
  list-style:none;
  margin: auto;
  padding: 0;
}

.menu .items .item {
  height: 70px;
  border-bottom: 1px solid #6780cc;
  display:flex;
  justify-content: center;
  align-items: center;
  color: #9fb5ef;
  font-size: 17pt;
}

.menu .items .item-active {
  background-color:#5172c3;
  color: #FFF;
}

.menu .items .item:hover {
  cursor: pointer;
  background-color: #4f6ebd;
  color: #cfe5ff;
}

/* === CONVERSATIONS === */

.discussions {
  overflow-y: scroll;
  width: 35%;
  height: 700px;
  box-shadow: 0px 8px 10px rgba(0,0,0,0.20);
  background-color: #87a3ec;
  display: inline-block;
}

.discussions .discussion {
  width: 100%;
  height: 90px;
  background-color: #FAFAFA;
  border-bottom: solid 1px #E0E0E0;
  display:flex;
  align-items: center;
  cursor: pointer;
}

.discussions .search {
  display:flex;
  align-items: center;
  justify-content: center;
  color: #E0E0E0;
}

.discussions .search .searchbar {
  height: 40px;
  background-color: #FFF;
  width: 70%;
  padding: 0 20px;
  border-radius: 50px;
  border: 1px solid #EEEEEE;
  display:flex;
  align-items: center;
  cursor: pointer;
}

.discussions .search .searchbar input {
  margin-left: 15px;
  height:38px;
  width:100%;
  border:none;
  font-family: 'Montserrat', sans-serif;;
}

.discussions .search .searchbar *::-webkit-input-placeholder {
    color: #E0E0E0;
}
.discussions .search .searchbar input *:-moz-placeholder {
    color: #E0E0E0;
}
.discussions .search .searchbar input *::-moz-placeholder {
    color: #E0E0E0;
}
.discussions .search .searchbar input *:-ms-input-placeholder {
    color: #E0E0E0;
}

.discussions .message-active {
  width: 98.5%;
  height: 90px;
  background-color: #FFF;
  border-bottom: solid 1px #E0E0E0;
}

.discussions .discussion .photo {
    margin-left:20px;
    display: block;
    width: 45px;
    height: 45px;
    background: #E6E7ED;
    -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}

.online {
  position: relative;
  top: 30px;
  left: 35px;
  width: 13px;
  height: 13px;
  background-color: #8BC34A;
  border-radius: 13px;
  border: 3px solid #FAFAFA;
}

.desc-contact {
  height: 43px;
  width:50%;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.discussions .discussion .name {
  margin: 0 0 0 20px;
  font-family:'Montserrat', sans-serif;
  font-size: 11pt;
  color:#515151;
}

.discussions .discussion .message {
  margin: 6px 0 0 20px;
  font-family:'Montserrat', sans-serif;
  font-size: 9pt;
  color:#515151;
}

.timer {
  margin-left: 15%;
  font-family:'Open Sans', sans-serif;
  font-size: 11px;
  padding: 3px 8px;
  color: #BBB;
  background-color: #FFF;
  border: 1px solid #E5E5E5;
  border-radius: 15px;
}

.chat {
  width: calc(65% - 85px);
}

.header-chat {
  background-color: #FFF;
  height: 90px;
  box-shadow: 0px 3px 2px rgba(0,0,0,0.100);
  display:flex;
  align-items: center;
}

.chat .header-chat .icon {
  margin-left: 30px;
  color:#515151;
  font-size: 14pt;
}

.chat .header-chat .name {
  margin: 0 0 0 20px;
  text-transform: uppercase;
  font-family:'Montserrat', sans-serif;
  font-size: 13pt;
  color:#515151;
}

.chat .header-chat .right {
  position: absolute;
  right: 40px;
}

.chat .messages-chat {
  padding: 25px 35px;
}

.chat .messages-chat .message {
  display:flex;
  align-items: center;
  margin-bottom: 8px;
}

.chat .messages-chat .message .photo {
    display: block;
    width: 45px;
    height: 45px;
    background: #E6E7ED;
    -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}

.chat .messages-chat .text {
  margin: 0 35px;
  background-color: #f6f6f6;
  padding: 15px;
  border-radius: 12px;
}

.text-only {
  margin-left: 45px;
}

.time {
  font-size: 10px;
  color:lightgrey;
  margin-bottom:10px;
  margin-left: 85px;
}

.response-time {
  float: right;
  margin-right: 40px !important;
}

.response {
  float: right;
  margin-right: 0px !important;
  margin-left:auto; /* flexbox alignment rule */
}

.response .text {
  background-color: #e3effd !important;
}

.footer-chat {
  width: calc(65% - 66px);
  height: 80px;
  display:flex;
  align-items: center;
  position:absolute;
  bottom: 0;
  background-color: transparent;
  border-top: 2px solid #EEE;
  
}

.chat .footer-chat .icon {
  margin-left: 30px;
  color:#C0C0C0;
  font-size: 14pt;
}

.chat .footer-chat .send {
  color:#fff;
  background-color: #4f6ebd;
  position: absolute;
  right: 50px;
  padding: 12px 12px 12px 12px;
  border-radius: 50px;
  font-size: 14pt;
}

.chat .footer-chat .name {
  margin: 0 0 0 20px;
  text-transform: uppercase;
  font-family:'Montserrat', sans-serif;
  font-size: 13pt;
  color:#515151;
}

.chat .footer-chat .right {
  position: absolute;
  right: 40px;
}

.write-message {
  border:none !important;
  width:60%;
  height: 50px;
  margin-left: 20px;
  padding: 10px;
}

.footer-chat *::-webkit-input-placeholder {
  color: #C0C0C0;
  font-size: 13pt;
}
.footer-chat input *:-moz-placeholder {
  color: #C0C0C0;
  font-size: 13pt;
}
.footer-chat input *::-moz-placeholder {
  color: #C0C0C0;
  font-size: 13pt;
  margin-left:5px;
}
.footer-chat input *:-ms-input-placeholder {
  color: #C0C0C0;
  font-size: 13pt;
}

.clickable {
  cursor: pointer;
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
  /* design : https://www.uplabs.com/posts/messaging-app-2db4a257-7f1d-4d1c-970d-4cf6527247ff by Anastasia Marinicheva */
</script>
<script type="text/javascript">
    $('.sideus').on('click', function(e){
    console.log("Side Div was clicked");
    var sender_id = "{{Auth::id()}}";
    var user_id = "{{Auth::id()}}";
    let reciever_id = $(this).attr("data-sideus");
  console.log(reciever_id);
      console.log(sender_id);
      var message = $('#yourmessage').val();
      let room = $(this).attr("data-room");
      console.log(room);
       $.ajax({
            url: "{{ route('opening_chat') }}",
            method: "GET",
            dataType: "JSON",
            data: {room:room , reciever_id:reciever_id },
            success:function(data){
            console.log(data);
          $('.thing').html(data.body);
          $('.thing').show();
        }
    })
   })

      $('.sideus').on('click', function(e){
    console.log("Side Div was clicked");
    let reciever_id = $(this).attr("data-sideus");
      let room = $(this).attr("data-room");
      console.log(room);
       $.ajax({
            url: "{{ route('call_chat') }}",
            method: "GET",
            dataType: "JSON",
            data: {room:room , reciever_id:reciever_id },
            success:function(data){
            $('#reciever_id').val(data.arr.id)
            $('#room').val(data.arr.room)

        }
    })
   })

   $(".messages-chat").animate({ scrollTop: $('.messages-chat').prop("scrollHeight")}, 1000);
    $('#it').on('click', function() {
      var user_id = $('#user_id').val();
      var sender_id = "{{Auth::user()->id}}";
      // var reciever_id = "{{isset($id)?$id:'0'}}";
      var reciever_id = $('#reciever_id').val();
      console.log(reciever_id);
      var message = $('#yourmessage').val();
      var room = $('#room').val();
     
      var  body = '<p class="text">'+message+'</p>';
      if(message!=""){
              $.ajax({
              url: "{{ route('create_chatting_again') }}",
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
                  $("#yourmessage").val("");
                  $(".ring form").append(body);
                  $(".messages-chat").animate({ scrollTop: $('.messages-chat').prop("scrollHeight")}, 1000); 
              }
          });
      }
      else{
          alert('Please fill all the field !');
      }
  });
 
 function showdata(){
      var room = $('#room').val();
      // let room = $(this).attr("data-room");
      // var room = "{{isset($room)?$room:'0'}}";
      console.log(room);
      
      // let reciever_id = $(this).attr("data-usname");
              var reciever_id = $('#reciever_id').val();
              console.log(reciever_id);
              var sender_id = $('#sender_id').val();
            $.ajax({
            url: "{{ route('fetchingt') }}",
            method: "GET",
            dataType: "JSON",
            data: {room:room , reciever_id:reciever_id},
            success:function(data){
          $('#ring').html(data.body);
          $("#ring").show();
        }
    })  
            }
            showdata();
            setInterval(function(){
              
                showdata();
            
            

            }, 3000);


</script>
</body>
</html>

