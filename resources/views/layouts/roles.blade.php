<!DOCTYPE html>
<html lang="en">
 
<head>
  <!-- Required meta tags -->
  @include('layouts.links')
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
  @include('layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      @include('layouts.sidebar')
      <!-- partial -->
     @yield('content')
    </div>
    @include('layouts.footer')
  </div>
@include('layouts.scripts')
<script type="text/javascript">
   $("#add-generic").click(function(){
        $("#generic-form").submit();
    }
</script>
</body>
</html>
