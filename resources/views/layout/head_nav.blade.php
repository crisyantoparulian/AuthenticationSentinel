
<div class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{url('/')}}">Articles App</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                  <ul class="nav navbar-nav">
                    <li class="{{ Request::is('create') ? 'active' : '' }}"><a href="{{url('create')}}">Create</a></li>
                    
                    <ul class="nav navbar-nav navbar-right">
                    @if (Sentinel::check())
                    <li>{!! link_to(route('logout'), 'Logout') !!}</li>
                    <li><a>Wellcome {!! Sentinel::getUser()->email !!}</a></li>
                    @else
                    <li class="{{ Request::is('signup') ? 'active' : '' }}"><a href="{{url('signup')}}">Signup</a></li>
                    <li>{!! link_to(route('login'), 'Login') !!}</li>
                    @endif
                  </ul>
                   <!--  <li><a href="javascript:void(0)">Link</a></li>
                 </ul> -->
                  <!-- <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control col-sm-8" placeholder="Search">
                    </div>
                  </form>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:void(0)">Link</a></li>
                    <li class="dropdown">
                      <a href="javascript:void(0)" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                        <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li><a href="javascript:void(0)">Another action</a></li>
                        <li><a href="javascript:void(0)">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)">Separated link</a></li>
                      </ul>
                    </li>
                  </ul> -->
                </div>
              </div>
            </div>

<!-- <nav >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Article</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('profile')}}">Profile</a></li>
      <li><a href="{{url('articles')}}">Article</a></li>
    </ul>
  </div>
</nav> -->