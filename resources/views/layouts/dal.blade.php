@extends('layouts.modal')
@section('content')
<!-- start modal -->
<!-- Button trigger modal -->
<div class='content-body'>
<div class="container">
  @if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
 @if(session('stat'))
<div class="alert alert-danger">{{session('stat')}}</div>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add a new record
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="myform" name="myform" action="{{route('submit1')}}" method="POST" enctype="multipart/form-data">
        @csrf
 
          <input type="text" name="record_id" id="record_id">
      <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your name" required="">
    <span id="nameError" class="alert-message"></span>
  </div>
<div class="mb-3">
    <label  class="form-label">Age</label>
    <input type="text" class="form-control" name="age" id="age" placeholder="Enter Your Age" required="">
    <span id="ageError" class="alert-message"></span>
  </div>
<div class="mb-3">
    <label  class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Address" required="" >
    <span id="addressError" class="alert-message"></span>
  </div>
  <div class="mb-3">
    <label  class="form-label">Department</label>
    <input type="text" class="form-control" name="department" id="department" placeholder="Enter Your Department" required="">
    <span id="departmentError" class="alert-message"></span>
  </div>
  <div class="mb-3">
    <label  class="form-label">Image</label>
    <input type="file" class="form-control" name="image_path" id="image_path" width="70px" height="70px" alt="image">
    <span id="imageError" class="alert-message"></span>
  </div>
   <div class="form-group">
          <label  class="form-label">CK EDITOR</label>
<textarea name="editor1"></textarea>
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> 
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submit" 
        class="btn btn-primary">Save Record</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
     <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table id="mytable" name="mytable" class="table table-bordered table-striped">
              <form action="{{ route('showit') }}" method="GET">
    <input class="form-control" type="text" name="search" placeholder="Search by Name or Department or Address" />
    <button class="btn btn-info" type="submit">Search</button>
         <a href="{{ route('showit') }}" class=" mt-1">
         <span class="input-group-btn">
     <button class="btn btn-danger" type="button" title="Refresh page">Refresh
         <span class="fas fa-sync-alt"></span>
     </button>  
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Serial-No</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Department</th>
                                 <th>Image</th>
                                 <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                              <?php
                                $no = '1';
                              ?>
                           @foreach($posts as $p)
                                <td id="id">{{$p->id}}</td>
                                <td id="serial">{{$no++}}</td>
                                <td id="nm">{{$p->user_id}}</td>
                                <td id="name">{{$p->name}}</td>
                                <td id="age" >{{$p->age}}</td>
                                <td id="address">{{$p->address}}</td>
                                <td id="department">{{$p->department}}</td> 
                                @if($p->image_path != '')
                                <td><img src="{{asset(''.$p->image_path)}}"></td>
                                @else
                                <td><img src="{{asset('images/default-no-image.jpg')}}"></td>
                                @endif
                                 <td id="department">{{$p->editor}}</td>
                                <td><a data-id = "{{$p->id}}" data-name = "{{$p->name}}" data-age = "{{$p->age}}" data-address = "{{$p->address}}"  data-department = "{{$p->department}}" data-image = "{{asset(''.$p->image_path)}}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary edit" id="edit">Edit</a></td>
                                 <td><a href="{{route('delete1',$p->id)}}" data-toggle="modal" class="btn btn-danger delete">Delete</a> </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>                 
@endsection