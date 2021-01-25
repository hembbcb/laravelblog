<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GEOSPATIAL BHUTAN </title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>

<header>
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
  </header>




            @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="copyright">&copy; GEOSPATIAL BHUTAN </p>
                </div>
                <div class="col-md-4">
                    <nav>
                        <ul class="social-icons">
                            <li><a href="#" class="i fa fa-facebook"></a></li>
                            <li><a href="#" class="i fa fa-twitter"></a></li>
                            <li><a href="#" class="i fa fa-google-plus"></a></li>
                            <li><a href="#" class="i fa fa-github"></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/bootstrap.min.js"></script>
</html>