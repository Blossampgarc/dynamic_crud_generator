<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-dark-sidebar/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 17:11:31 GMT -->
<head>
  @include('layouts.links')
  <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
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
@stack('script')  

</body>
</html>

