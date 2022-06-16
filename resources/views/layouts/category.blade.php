@extends('layouts.cat')
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
        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="myform" name="myform" action="{{route('create_category')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="hidden" name="record_id" id="record_id">
    
<div class="mb-3">
    <label  class="form-label">Category Name</label>
    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Your Category Name" required="">
    <span id="categoryError" class="alert-message"></span>
  </div>
<div class="mb-3">
    <label  class="form-label">Category Slug</label>
    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Your Category Slug" required="" >
    <span id="cat_slugError" class="alert-message"></span>
  </div>
    <div class="form-group">
    <table>
    <label for="department">Parent ID:</label>
   <select  name="parent_id" id="parent_id"  class="form-control">
    <option value="" disabled="" selected="">Please select your option</option>
    @foreach ($category as $dep)
       <option value="{{$dep->id}}">{{$dep->id}}-{{$dep->category_name}}</option>
        @endforeach
   </select>
   </table>
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
      <div class="col-md-3">
<span class="font-weight-bold sort-font">Sort By:</span>
<a href="{{URL::current().'?sort=parent_id' }}">All</a><br>
<a href="{{URL::current().'?sort=parent_id_asc' }}">By low to high parent id</a><br>
<a href="{{URL::current().'?sort=parent_id_desc' }}">By high  to low parent id</a><br>
<a href="{{URL::current().'?sort=parent_id_category' }}">By Category</a><br> 
<a href="{{URL::current().'?sort=parent_id_subcategory' }}">By Sub Category</a><br> 
<a href="{{URL::current().'?sort=parent_id_childcategory' }}">By Child Category</a><br> 
  </div>
      <div class="col-md-9">
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
                                <th>Serail-no</th>
                                <th>Category Name</th>
                                <th>Parent ID</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                              <?php
                                $no = '1';
                              ?>

                               @foreach($category as $p)
                                <td id="id">{{$p->id}}</td>
                                <td id="serial">{{$no++}}</td>
                                <td id="name">{{$p->category_name}}</td>
                                <td id="parent_id" >{{$p->parent_id}}</td>
                                </tr>
                       
                        @endforeach
                                
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