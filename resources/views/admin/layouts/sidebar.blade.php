<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @if (Auth::guard('admin')->user()->type == "vendor")
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Vendor Details</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/personal')}}">Personal Details</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/business')}}">Business Details</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/bank')}}">Bank Details</a></li>
          </ul>
        </div>
      </li>
      @else
      {{-- settings --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="settings">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.password.check')}}">Update Password</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.details.update')}}">Update Details</a></li>
          </ul>
        </div>
      </li>

      {{-- Admin Management --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#admin-management" aria-expanded="false" aria-controls="admin-management">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Admin Manangement</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="admin-management">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins/super_admin')}}">Super Admin</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins/sub_admin')}}">Sub-Admin</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins/vendor')}}">Vendor</a></li>
          </ul>
        </div>
      </li>

      {{-- User Management --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">User Manangement</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user-management">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/users')}}">Users</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/subscribers')}}">Subscribers</a></li>
          </ul>
        </div>
      </li>

      {{-- catalog Management --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#catalog-management" aria-expanded="false" aria-controls="catalog-management">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Catalog Manangement</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="catalog-management">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/sections')}}">Sections</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/categories')}}">Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">Products</a></li>
          </ul>
        </div>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Form elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{asset('admin/pages/forms/basic_elements.html')}}">Basic Elements</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="icon-bar-graph menu-icon"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{asset('admin/pages/charts/chartjs.html')}}">ChartJs</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{asset('admin/pages/tables/basic-table.html')}}">Basic table</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="icon-contract menu-icon"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{asset('admin/pages/icons/mdi.html')}}">Mdi icons</a></li>
          </ul>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{asset('admin/pages/samples/login.html')}}"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{asset('admin/pages/samples/register.html')}}"> Register </a></li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{asset('admin/pages/samples/error-404.html')}}"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{asset('admin/pages/samples/error-500.html')}}"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('admin/pages/documentation/documentation.html')}}">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>