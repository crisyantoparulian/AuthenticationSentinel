
                   
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Articles</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{url('home')}}">Home</a></li>
      <li class="{{ Request::is('articles') ? 'active' : '' }}"><a href="{{url('articles')}}">Articles</a></li>
    </ul>
    <div id="main-content" class="navbar-form navbar-left">
  
      <div class="input-group">
        <input type="text" class="form-control" id="keywords" placeholder="Search">
        <div class="input-group-btn">
          <button id="search" class="btn btn-default" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
      </div>
    <ul class="nav navbar-nav navbar-right">
                    @if (Sentinel::check())
                     <li><a>Wellcome {!! Sentinel::getUser()->email !!}</a></li>
                    <li>{!! link_to(route('logout'), 'Logout') !!}</li>
                    @else
                    <li class="{{ Request::is('signup') ? 'active' : '' }}"><a href="{{url('signup')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                     <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @endif
      
    </ul>
  </div>

</nav>

<!-- 
                   <div class="navbar navbar-info">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-material-light-blue-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">Brand</a>
    </div>
    <div class="navbar-collapse collapse navbar-material-light-blue-collapse">
      <ul class="nav navbar-nav">
                    <li class="{{ Request::is('create') ? 'active' : '' }}"><a href="{{url('create')}}">Create</a></li>
                    </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group" align="center">
          <input type="text" class="form-control col-sm-8" placeholder="Search">
        </div>
      </form>
      <li class="dropdown">
          <a href="index.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
            <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="javascript:void(0)">Action</a></li>
            <li><a href="javascript:void(0)">Another action</a></li>
            <li><a href="javascript:void(0)">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="javascript:void(0)">Separated link</a></li>
          </ul>
        </li>
      <ul class="nav navbar-nav navbar-right">                    
                     @if (Sentinel::check())
                     <li><a>Wellcome {!! Sentinel::getUser()->email !!}</a></li>
                    <li>{!! link_to(route('logout'), 'Logout') !!}</li>
                    @else
                    <li class="{{ Request::is('signup') ? 'active' : '' }}"><a href="{{url('signup')}}">Signup</a></li>
                    <li>{!! link_to(route('login'), 'Login') !!}</li>
                    @endif
                  </ul>


    </div>
  </div>
</div> -->