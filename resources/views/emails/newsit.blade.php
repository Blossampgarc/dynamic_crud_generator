@extends('emails.news')
@section('content')

<div class="card">
  <div class="image">
    <img src="https://cdn.pixabay.com/photo/2019/01/12/16/21/breakfast-3928800_960_720.jpg" alt="img">
  </div>
  <div class="subscribe">
    <h2>Get diet and fitness tips in your inbox</h2>
    <p>Eat better and exercise better. Sign up for the Diet&Fitness newsletter.</p>
    <form action="{{route('newletit')}}" method="post">
      @csrf
      <input type="email" name="email" id="email" placeholder="Enter your email address" autocomplete="off">
      <button type="button" id="submit" name="submit">Subscribe</button>
    </form>
  </div>
</div>
@endsection