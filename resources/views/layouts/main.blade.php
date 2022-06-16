<!DOCTYPE html>
<html lang="en">

<head>
 @include('layouts.links')
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
</body>

</html>

