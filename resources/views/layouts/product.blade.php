@extends('layouts.pro')
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
        <h5 class="modal-title" id="exampleModalLabel">Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="myform" name="myform" action="{{route('create_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="hidden" name="record_id" id="record_id">
    
<div class="mb-3">
    <label  class="form-label">Product Name</label>
    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Your Product Name" required="">
    <span id="productError" class="alert-message"></span>
  </div>
<div class="mb-3">
    <label  class="form-label">Description</label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Your Description" required="" >
    <span id="descriptionError" class="alert-message"></span>
  </div>
   <div class="mb-3">
    <label  class="form-label">Image</label>
    <input type="file" class="form-control" name="image" id="image" width="70px" height="70px" alt="image">
    <span id="imageError" class="alert-message"></span>
  </div>
    <div class="mb-3">
    <label  class="form-label">Price</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="Enter Your Category Slug" required="" >
    <span id="priceError" class="alert-message"></span>
  </div>
  <div class="mb-3">
    <label  class="form-label">Quantity</label>
    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter Your Products quantity" required="" >
    <span id="quantityError" class="alert-message"></span>
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
  <div class="row">
   
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table id="mytable" name="mytable" class="table table-bordered table-striped">
              <form id="catfilter">
                            
    <div class="min-max-slider" id="slider-range" data-legendnum="2">
       <input type="hidden" id="filter_price_start" name="filter_price_start" value=""/>
    <input type="hidden" id="filter_price_end" name="filter_price_end" value=""/>
    <label for="min">Minimum price</label>
    <input id="min" class="min" name="min" type="range" step="1" min="0" max="3000" />
    <label for="max">Maximum price</label>
    <input id="max" class="max" name="max" type="range" step="1" min="0" max="3000" />
    <button class="aa-filter-btn" type="button" 
    onclick="sort_price_filter()">Filter</button>
</div>
              </form>
            <form action="{{route('product')}}" method="GET">
       
              <label for="search"></label>
    <input class="form-control" type="text" name="search" list="searchlist" id="search" placeholder="Search by Name or Department or Address" />
     <datalist id="searchlist">
      @foreach($category as $p)
    <option value="{{$p->product_name}}">{{$p->product_name}}</option>
       <option value="{{$p->description}}">{{$p->description}}</option>
          @endforeach
  </datalist>

    <button class="btn btn-info" type="submit">Search</button>
         <a href="" class=" mt-1">
         <span class="input-group-btn">
     <button class="btn btn-danger" type="button" title="Refresh page">Refresh
         <span class="fas fa-sync-alt"></span>
     </button>   
     <div  class="col-sm-9 padding-right"  id="updateDiv" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Serail-no</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                 <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
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
                                <td id="product_name">{{$p->product_name}}</td>
                                <td id="description" > <?php echo Str::limit(html_entity_decode($p->description), 50); ?></td>
                                 @if($p->image != '')
                                <td><img src="{{asset('images/'.$p->image)}}"></td>
                                @else
                                <td><img src="{{asset('images/default-no-image.jpg')}}"></td>
                                @endif
                                 <td id="price" >{{$p->price}}</td>
                                <td id="quantity" >{{$p->quantity}}</td>
                                </tr>
                       
                        @endforeach
                                
                        </tbody>
                        </div>    
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="row portfolio-grid" id="coding">
                         @foreach($category as $p)
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                          <figure class="effect-text-in">
                            @if($p->image != '')
                                <img src="{{asset('images/'.$p->image)}}" alt="image"  width="100" height="150">
                                @else
                                <img src="{{asset('images/default-no-image.jpg')}}" width="100" height="150">
                                @endif
                            <figcaption>
                              <h4>{{$p->product_name}}</h4>
                              <p>{{$p->price}}</p>
                            </figcaption>

                          </figure>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
                    </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>                 
@endsection