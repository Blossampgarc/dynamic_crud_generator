<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-dark-sidebar/pages/forms/validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 17:11:29 GMT -->
<head>
  @include('layouts.links')
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
   @include('layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
     @include('layouts.sidebar')
      <!-- partial -->
        @yield('content')
      <!-- main-panel ends -->
    </div>
      @include('layouts.footer')
    <!-- page-body-wrapper ends -->
  </div>
  
  @include('layouts.scripts')
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-dark-sidebar/pages/forms/validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 17:11:29 GMT -->
</html>
