<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-dark-sidebar/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 17:11:31 GMT -->
<head>
 
  @include('layouts.links')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
  
</head>

<body class="sidebar-dark">
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap");

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  height: 100vh;
  display: flex;
  
  align-items: center;
  background-color: #3c3c44;
  font-family: "Open Sans", sans-serif;
}

.card {
  width: 40rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-radius: 1rem;
  background-color: #303037;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.7);
}

.image {
  width: 100%;
  display: flex;
  align-items: center;
}

.image img {
  width: 100%;
  height: 100% !important;
  border-top-left-radius: 1rem;
  border-bottom-left-radius: 1rem;
}

.subscribe {
  flex: 1;
  margin-left: 2rem;
  color: #fff;
}

.subscribe p {
  margin: 1rem 0;
  font-weight: 300;
  font-size: 14px;
  letter-spacing: 1px;
}

.subscribe form {
  display: flex;
  align-items: center;
}

.subscribe form input {
  padding: 0.75rem;
  border-radius: 0.25rem;
  outline: none;
  border: 1px solid #94949c;
  background: transparent;
  color: #94949c;
  font-weight: 300;
}

.subscribe form button {
  padding: 0.75rem;
  border-radius: 0.25rem;
  outline: none;
  margin-left: 0.5rem;
  border: 1px solid #93c814;
  background-color: #93c814;
  color: #303037;
  cursor: pointer;
  transition: 0.3s ease-in-out;
}

.subscribe form button:hover {
  background: transparent;
  color: #93c814;
}

  </style>
  <div class="container-scroller">

  @include('layouts.header')

    <div class="container-fluid page-body-wrapper">

      @include('layouts.sidebar')

     @yield('content')

    </div>

    @include('layouts.footer')

  </div>
@include('layouts.scripts')
</body>
</html>

