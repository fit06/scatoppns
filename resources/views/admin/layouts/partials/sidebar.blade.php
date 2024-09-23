<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route(Auth::user()->role.'.dashboard') }}" class="logo">
                <img src="{{ url($setting->logo) }}" alt="navbar brand" class="navbar-brand me-2" width="40" />
                <span class="text-white">
                    {{ $setting->nama_website }}
                </span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item @if(Request::segment(2)=='dashboard') active @endif">
                    <a href="{{ route(Auth::user()->role.'.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Main Menu</p>
                    </a>
                </li>
                <li class="nav-item @if(Request::segment(2)=='io_status') active @endif">
                    <a href="{{ route(Auth::user()->role.'.io_status', 'Input') }}">
                        <i class="fas fa-list"></i>
                        <p>I/O Status</p>
                    </a>
                </li>
                <li class="nav-item @if(Request::segment(2)=='settings') active @endif">
                    <a href="{{ route(Auth::user()->role.'.settings', 'setting') }}">
                        <i class="fas fa-cog"></i>
                        <p>Setting</p>
                    </a>
                </li>
                <li class="nav-item @if(Request::segment(2)=='aboutus') active @endif">
                    <a href="{{ route(Auth::user()->role.'.aboutus') }}">
                        <i class="fas fa-file"></i>
                        <p>About Us</p>
                    </a>
                </li>
                

                @if(Auth::user()->role == 'admin')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Manajemen</h4>
                    </li>

                    <li class="nav-item @if(Request::segment(2)=='inputoutput') active @endif">
                        <a href="{{ route(Auth::user()->role.'.inputoutput') }}">
                            <i class="fas fa-list"></i>
                            <p>Input Output</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(2)=='conveyor') active @endif">
                        <a href="{{ route(Auth::user()->role.'.conveyor') }}">
                            <i class="fas fa-list"></i>
                            <p>Conveyor</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(2)=='valve') active @endif">
                        <a href="{{ route(Auth::user()->role.'.valve') }}">
                            <i class="fas fa-list"></i>
                            <p>Valve</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(2)=='pengguna') active @endif">
                        <a href="{{ route(Auth::user()->role.'.pengguna') }}">
                            <i class="fas fa-users"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(2)=='about') active @endif">
                        <a href="{{ route(Auth::user()->role.'.about') }}">
                            <i class="fas fa-file"></i>
                            <p>About</p>
                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(2)=='setting') active @endif">
                        <a href="{{ route(Auth::user()->role.'.setting') }}">
                            <i class="fas fa-cog"></i>
                            <p>Pengaturan Website</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout', Auth::user()->role) }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>