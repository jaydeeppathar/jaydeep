<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('adminTheme/light-logo.png') }}" style="width: 65px; margin-top: -12px; margin-left: 68px;"></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <hr>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a></li>
        <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('user.index') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Admin">Admin</span></a></li>
        <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('category.index') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="category">Category</span></a></li>
        <li class="nav-item {{ Request::is('admin/sub-category*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('sub-category.index') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="sub-category">Sub Category</span></a></li>
        <li class="nav-item {{ Request::is('admin/product*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('product.index') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="sub_category">Product</span></a></li>
        <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('contactus.index') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="sub_category">ContactUS</span></a></li>

        <li class="nav-item has-sub {{ Request::is('pages*') ? 'sidebar-group-active open' : '' }}">
            <a class="d-flex align-items-center" href="#">
                <i class="fa fa-columns" aria-hidden="true"></i>
                <span class="menu-title text-truncate" data-i18n="User">Pages</span>
            </a>
            <ul class="menu-content">
                {{-- @foreach($pages as $key => $value)
                  @php
                      $slug = explode("/", request()->path())['1'] ?? '-';
                  @endphp
                  <li class="{{ Request::is('pages*') && $value->slug == $slug ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{ route('pages.index',$value->slug) }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ $value->title }}</span></a></li>
                @endforeach --}}
            </ul>
        </li>
      
    </ul>
  </div>
</div>