<!DOCTYPE html>
<html lang="en">
<head>
  <title>Articles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/custom/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
 <!--  <link rel="stylesheet" href="{{ asset('css/material-design/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-design/ripples.min.css') }}"> -->
</head>
<body>
  @include('layout.head_nav')
  <main role="main" class="container">
    <div class="jarak"></div>
<div class="row">

        <div class="col-sm-12 blog-main">

          <div class="blog-post">
      @if (Session::has('error'))
      <div class="session-flash alert-danger">
      {{Session::get('error')}}
      </div>
      @endif
      @if (Session::has('notice'))
      <div class="session-flash alert-info">
      {{Session::get('notice')}}
      </div>
      @endif

      @yield("content")   
    </div>
  </div>
</div>
<script src="{{ asset('js/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/popper.js') }}"></script>
  <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
   <!--  <script src="{{ asset('js/material-design/material.min.js') }}"></script>
  <script src="{{ asset('js/material-design/ripples.min.js') }}"></script> -->


</body>
</html>