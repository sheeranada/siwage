 <header class="navbar navbar-expand-lg mb-3">
     <div class="container-xxl">
         <a class="navbar-brand" href="#">
             <img src="{{ asset('asset/img/gkjw.png') }}" alt="Logo" width="25" height="25"
                 class="d-inline-block align-text-top">
             SIWAGE
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">
                 <li class="nav-item border-end border-dark-subtle pe-2 me-2">
                     <span class="nav-link disabled">v{{ config('app.version') }}</span>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="/home">
                         <img src="{{ asset('asset/icon/github.svg') }}" alt="github" class="logo-sidebar">
                     </a>
                 </li>
                 <li class="nav-item dropdown ">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                         aria-expanded="false">
                         <img src="{{ asset('asset/icon/user.svg') }}" alt="user" class="logo-sidebar">
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{ route('user.show', auth()->id()) }}">
                                 <i class="fas fa-gear"></i>
                                 Setting</a></li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li>
                             <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                 <i class="fas fa-power-off"></i> Logout
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                         </li>
                     </ul>
                 </li>


             </ul>
         </div>
     </div>
 </header>
