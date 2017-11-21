<!DOCTYPE html>
<html lang="en">
<head>
  <title>Articles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}"/>
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
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
   <!--  <script src="{{ asset('js/material-design/material.min.js') }}"></script>
  <script src="{{ asset('js/material-design/ripples.min.js') }}"></script> -->
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>
    <script type="text/javascript">
      //add
      $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '{{ URL::route('comments.store') }}',
                data: {
                    '_token': $('#_token').val(),
                    'article_id': $('#id_add').val(),
                    'user': $('#user_add').val(),
                    'content': $('#content_add').val()
                },
                success: function(data) {
                    $('.errorUser').addClass('hidden');
                    $('.errorContent').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.user) {
                            $('.errorUser').removeClass('hidden');
                            $('.errorUser').text(data.errors.user);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        $('#postTable').prepend("<tr class='item" + data.id + "'><td>" + data.user + "</br>" + data.content + "</td><button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-user='" + data.user + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");                        
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
            });
        });
    </script>
</body>
</html>