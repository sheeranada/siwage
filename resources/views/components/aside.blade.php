 <aside class="main-sidebar sidebar-light-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('asset/img/gkjw.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">SIWAGE</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('asset/icon/user.svg') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">
                         <img class="logo-sidebar" src="{{ asset('asset/icon/home.svg') }}" alt="home"
                             loading="lazy">
                         <p>Home</p>
                     </a>
                 </li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li
                     class="nav-item {{ request()->is('kelompok*') || request()->is('keluarga*') || request()->is('warga*') ? 'menu-open' : '' }}">
                     <a href="#"
                         class="nav-link {{ request()->is('kelompok*') || request()->is('keluarga*') || request()->is('warga*') ? 'active' : '' }}">
                         <img src="{{ asset('asset/icon/warga.svg') }}" alt="" class="logo-sidebar">
                         <p>
                             Data Warga
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('kelompok*') ? 'active' : '' }}"
                                 href="{{ route('kelompok.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kelompok</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('keluarga*') ? 'active' : '' }}"
                                 href="{{ route('keluarga.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Keluarga</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('warga*') ? 'active' : '' }}"
                                 href="{{ route('warga.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Warga</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li
                     class="nav-item {{ request()->is('pekerjaan*') || request()->is('pendidikan*') || request()->is('talenta*') ? 'menu-open' : '' }}">
                     <a href="#"
                         class="nav-link {{ request()->is('pekerjaan*') || request()->is('pendidikan*') || request()->is('talenta*') ? 'active' : '' }}">
                         <img class="logo-sidebar" src="{{ asset('asset/icon/1.svg') }}" class="logo-sidebar">
                         <p>
                             Profil Kompetensi
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('pekerjaan*') ? 'active' : '' }}"
                                 href="{{ route('pekerjaan.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pekerjaan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('pendidikan*') ? 'active' : '' }}"
                                 href="{{ route('pendidikan.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pendidikan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('talenta*') ? 'active' : '' }}"
                                 href="{{ route('talenta.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Talenta</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li
                     class="nav-item {{ request()->is('status_warga*') || request()->is('status_keluarga*') || request()->is('status_nikah*') ? 'menu-open' : '' }}">
                     <a href="#"
                         class="nav-link {{ request()->is('status_warga*') || request()->is('status_keluarga*') || request()->is('status_nikah*') ? 'active' : '' }}">
                         <img class="logo-sidebar" src="{{ asset('asset/icon/status.svg') }}" alt="home"
                             loading="lazy">
                         <p>
                             Status
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('status_warga*') ? 'active' : '' }}"
                                 href="{{ route('status_warga.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Status Warga</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('status_keluarga*') ? 'active' : '' }}"
                                 href="{{ route('status_keluarga.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Status Keluarga</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('status_nikah*') ? 'active' : '' }}"
                                 href="{{ route('status_nikah.index') }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Status Nikah</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ request()->is('akun/*') ? 'active' : '' }}"
                         href="{{ route('akun.show', auth()->user()->id) }}">
                         <img class="logo-sidebar" src="{{ asset('asset/icon/user.svg') }}" alt="home"
                             loading="lazy">
                         <p>Akun</p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
