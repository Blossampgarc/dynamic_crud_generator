@extends('layouts.subcat')
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
        <h5 class="modal-title" id="exampleModalLabel">SubCategory</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="myform" name="myform" action="" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="hidden" name="record_id" id="record_id">
      <div class="form-group">
    <table>
    <label for="department">Category Name:</label>
   <select  name="department_id" id="department" required="" class="form-control">
    <option value="" disabled="" selected="">Please select your option</option>
    @foreach ($category as $dep)
       <option value="{{$dep->id}}">{{$dep->category_name}}</option>
        @endforeach
   </select>
   </table>
  </div>
<div class="mb-3">
    <label  class="form-label">SubCategory Name</label>
    <input type="text" class="form-control" name="age" id="age" placeholder="Enter Your Age" required="">
    <span id="ageError" class="alert-message"></span>
  </div>
<div class="mb-3">
    <label  class="form-label">SubCategory Slug</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Address" required="" >
    <span id="addressError" class="alert-message"></span>
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
         <a href="" class=" mt-1">
         <span class="input-group-btn">
     <button class="btn btn-danger" type="button" title="Refresh page">Refresh
         <span class="fas fa-sync-alt"></span>
     </button>  
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Sub Category Slug</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                              <?php
                                $no = '1';
                              ?>
                                </tr>
                        </tbody>
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>                 
@endsection