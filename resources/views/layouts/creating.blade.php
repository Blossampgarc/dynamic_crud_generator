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
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="field_name['+i+']" placeholder="Enter your Field Name" class="form-control" /></td><td><input type="text" name="field_size['+i+']" placeholder="Enter your Data size" class="form-control" /></td><td><select style="background-color:Grey;" name="data_type['+i+']" class="form-control" ><option value="integer">Integer</option><option value="string">String</option><option value="text">Text</option><option value="mediumText">Image/Video</option><option value="date">Date</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
</body>
</html>
