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
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( '#summary-ckeditor' );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> -->
 <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
  $('#name').keyup(function () {
      // single value 
      var str = $(this).val()
    // $(#username).val().replace('', '-');

    $(this).val(str.replace(/ /g, "_"))
  
  });

  $("tbody").on("click", ".edit", function(e){
    console.log("Edit button clicked")
    let id = $(this).attr("data-id");
  let slug = $(this).attr("data-slug");
  let p = $(this).attr("data-p");
  let image = $(this).attr("data-image");
  let video = $(this).attr("data-video");
   // console.log(video);
  var formData = new FormData($('#myform')[0]);
  console.log(formData);
  fetch('{{route('edit')}}/'+id+'/'+slug).then(e=>{
    return e.json()
  }).then(e=>{
          $('#myform').find('[name="record_id"]').eq(0).val(e.data.id)
         
    for(let q in e.data){

      if($('#myform').find('[name="'+q+'"]').length>0){
        $('#myform').find('[name="'+q+'"]').eq(0).val(e.data[q])
      }
    }
  })


 })
})
</script>
</body>
</html>

