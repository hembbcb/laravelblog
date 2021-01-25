@extends('layouts.app')
@section('content')

<nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
           
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand">
              <a algin="right"> GEOSPATIAL BHUTAN |</a>
              <span algin="left">Gives people the power to see their data</span>

              </div>
              
            </div>

 
            <div class="collapse navbar-collapse" id="the-navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('blog')}}">Blog</a></li>
                <li><a href="{{route('blog.about')}}">About</a></li>
                <li><a href="{{route('blog.contact')}}">Contact</a></li>
                <li><a href="#">Applications</a></li>
                <li onclick="return confirm('Click Ok If You Own This Blog')"></i><a href="{{ url('/login') }}">Login</a></li>
              </ul>
            </div>
          </div>
    </nav>


<div class="login-box">
            <div class="login-logo">
                <a href=""><b>GEOSPATIAL </b> BHUTAN</a>
                        </div>
                        
                        
                        <div class="login-box-body">

                            <p class="login-box-msg">Sign in to start your session</p>
                             <p class="login-box-msg">    
                            @if ($flash = session('logout'))
                                <strong>{{ $flash }}</strong>
                            @endif
                            </p>
                            <form method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback" >
                                <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="fa fa-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" placeholder="Password" name="password" required autocomplete="current-password">
                                <span class="fa fa-lock form-control-feedback"></span>
                           
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                           
                           
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                                </div>
                            
                                
                                <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                        
                                
                            </div>
                            </form>

                            <br>
                            <a href="{{ url('/password/reset') }}">I forgot my password</a><br>

            </div>

  
</div>

@endsection
