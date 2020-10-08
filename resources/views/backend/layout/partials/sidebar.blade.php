<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin')}}">
      <div class="sidebar-brand-icon">
        <img src="{{asset('ui/backend')}}/img/logo/logo2.png">
      </div>
      <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{url('/admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Operations
    </div>
    
    <li class="nav-item">
      <a class="nav-link" href="{{url('/admin/products/')}}"> 
        <i class="fas fa-book" aria-hidden="true"></i>
        <span>Products</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/categories/')}}"> 
        <i class="fas fa-shopping-bag" aria-hidden="true"></i>
       
        <span>Catagories</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/subcategory/')}}"> 
        <i class="fas fa-shopping-bag" aria-hidden="true"></i>
       
        <span>Subcatagory</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/admin/orders/')}}"> 
        <i class="fas fa-shopping-bag" aria-hidden="true"></i>
       
        <span>Orders</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/message/')}}"> 
        <i class="fas fa-envelope" aria-hidden="true"></i>
      
        <span>Messages</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/login/')}}"> 
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>Login</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/register/')}}"> 
        <i class="fa fa-user-secret" aria-hidden="true"></i>
        <span>Register</span>
      </a>
    </li>
   
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>