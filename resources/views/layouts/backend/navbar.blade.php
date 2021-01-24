<header class="main-header">

<a href="/" class="logo">

<span class="logo-mini"><b>GEOSPATIAL</b> BHUTAN</span>

<span class="logo-lg"><b>GEOSPATIAL</b> BHUTAN</span>
</a>
<nav class="navbar navbar-static-top">

<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{Auth:: user()->profile_url}}" class="user-image" alt="{{ Auth:: user()-> name}}">
        <span class="hidden-xs">{{ Auth:: user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
    
        <li class="user-header">
        <img src="{{Auth:: user()->profile_url}}" class="user-image" alt="{{ Auth:: user()-> name}}">
            <p>{{ Auth:: user()->name}}

            <small> Member Since {{ Auth:: user()-> created_at}}</small>
            </p>
           
        </li>
    
        <li class="user-footer">
            <div class="pull-left">
            <a class="btn btn-default btn-flat"
             href = "{{url('/logout')}}"
             onclick = "event.preventDefault();
             document.getElementById('logout-form').submit();">Logout </a>             
             
             
             <form id="logout-form" action="{{ url('/logout') }}"  style="display:none">
             {{ csrf_field() }}
            
            </form>
            </div>
        </li>
        </ul>
    </li>
    </ul>
</div>
</nav>
</header>