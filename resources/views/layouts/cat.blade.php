<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-dark-sidebar/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 17:11:31 GMT -->
<head>
 
  @include('layouts.links')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
  

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
 <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("tbody").on("click", ".edit", function(e){
    console.log("Edit button clicked")
    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let age = $(this).attr("data-age");
    let address = $(this).attr("data-address");
    let department = $(this).attr("data-department");
    let image = $(this).attr("data-image");
    $("#record_id").val(id)
    $("#name").val(name)
    $("#age").val(age)
    $("#address").val(address)
    $("#department").val(department) 
    $("#image_path").val(image)  
 })
  })
</script>
</body>
</html>

