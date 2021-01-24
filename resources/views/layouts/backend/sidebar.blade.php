<aside class="main-sidebar">

    <section class="sidebar">
    
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{Auth:: user()->profile_url}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth:: user()-> name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li>
          <a href="{{url('/home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backend.blog.index') }} "><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="{{ route('backend.blog.create')}} "><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>
        <li><a href="{{ route('backend.categories.index')}}"><i class="fa fa-folder"></i> <span>Categories</span></a></li>
        <li><a href="{{ route('backend.users.index')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
      </ul>
    </section>
  
  </aside>