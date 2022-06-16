<!DOCTYPE html>
<!--Code By Webdevtrick ( https://webdevtrick.com )-->
<html lang="en">
   <head>
   	 @include('layouts.links')
      <meta charset="UTF-8">
      <title>Send email</title>
   </head>
   <body>
   	  <div class="container-scroller">
   	 @include('layouts.header')
   	  <div class="container-fluid page-body-wrapper">
   	  @include('layouts.sidebar')
 
   	<form action="{{route('emailable')}}" method="post" >
   		@csrf
<label>Name:</label>
<input class="form-control" type="text" name="name"><br>
<label>Emai:</label>
<input class="form-control" type="text" name="email"><br>
<label>Message:</label>
<input class="form-control" type="text" name="message" size="50"><br><br>
 <button type="submit" name="submit" id="submit" 
        class="btn btn-primary">Save Record</button>
</form>
</div>
  @include('layouts.footer')

</div>
    </body>
</html>