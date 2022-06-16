<!-- sidebar -->
<?php
$care = App\Models\main::where("is_active", 1)->where("is_deleted", 0)->where("status", 1)->get();
?>

 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li> <a class="nav-link" href="{{route('index_page')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
           <li> <a class="nav-link" href="{{route('display')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">All Cruds</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">CRUD</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{route('showit')}}">Modal</a></li>
                 <li class="nav-item"> <a class="nav-link" href="{{route('create_crud')}}">Make Crud</a></li>
              </ul>
            </div>
          </li>
                    <li class="nav-item">
            <a class="nav-link" href="{{route('roles')}}">
              <i class="icon-star menu-icon"></i>
              <span class="menu-title">Roles</span>
            </a>
          </li>
                 @foreach($care as $side)
          @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
 <li class="nav-item">
            <a class="nav-link" href="{{route('show',$side->name)}}">
              <i class="icon-star menu-icon"></i>
              <span class="menu-title">{{$side->name}}</span>
            </a>
          </li>
@endif
@endforeach
@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
 <li class="nav-item">
            <a class="nav-link" href="{{route('dmail')}}">
              <i class="icon-star menu-icon"></i>
              <span class="menu-title">Email sending</span>
            </a>
          </li>
@endif
@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
 <li class="nav-item">
            <a class="nav-link" href="{{route('newsletter')}}">
              <i class="icon-star menu-icon"></i>
              <span class="menu-title">Subscription Process</span>
            </a>
          </li>
@endif
          @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
     <li class="nav-item">
                <a class="nav-link" href="{{route('subcategory')}}">
                  <i class="icon-star menu-icon"></i>
                  <span class="menu-title">Subcategory</span>
                </a>
              </li>
    @endif
     @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
     <li class="nav-item">
                <a class="nav-link" href="{{route('category')}}">
                  <i class="icon-star menu-icon"></i>
                  <span class="menu-title">category</span>
                </a>
              </li>
    @endif
     @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
     <li class="nav-item">
                <a class="nav-link" href="{{route('product')}}">
                  <i class="icon-star menu-icon"></i>
                  <span class="menu-title">Products</span>
                </a>
              </li>
    @endif
     @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
     <li class="nav-item">
                <a class="nav-link" href="{{route('chatting_again')}}">
                  <i class="icon-star menu-icon"></i>
                  <span class="menu-title">Chatting</span>
                </a>
              </li>
    @endif
    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
     <li class="nav-item">
                <a class="nav-link" href="{{route('stripe')}}">
                  <i class="icon-star menu-icon"></i>
                  <span class="menu-title">Stripe</span>
                </a>
              </li>
    @endif
     @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
     <li class="nav-item">
                <a class="nav-link" href="{{route('paypal')}}">
                  <i class="icon-star menu-icon"></i>
                  <span class="menu-title">Paypal</span>
                </a>
              </li>
    @endif
        </ul>
      </nav>