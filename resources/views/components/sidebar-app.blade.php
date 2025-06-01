<aside class="col-md-3 col-lg-2 d-md-block sidebar collapse show" id="sidebarMenu">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">
                    <img class="logo-sidebar" src="{{ asset('asset/icon/home.svg') }}" alt="home" loading="lazy">
                    Home
                </a>
            </li>
            <li>
                <hr class="nav-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('kelompok*') || request()->is('keluarga*') || request()->is('warga*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#collapseProfilWarga" role="button"
                    aria-expanded="{{ request()->is('kelompok*') || request()->is('keluarga*') || request()->is('warga*') ? 'true' : 'false' }}"
                    aria-controls="collapseProfilWarga">
                    <span>
                        <img class="logo-sidebar" src="{{ asset('asset/icon/warga.svg') }}" alt="home"
                            loading="lazy">
                        Profil Warga
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>

                <div class="collapse {{ request()->is('kelompok*') || request()->is('keluarga*') || request()->is('warga*') ? 'show' : '' }}"
                    id="collapseProfilWarga">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('kelompok*') ? 'active' : '' }}"
                                href="{{ route('kelompok.index') }}">
                                Kelompok
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('keluarga*') ? 'active' : '' }}"
                                href="{{ route('keluarga.index') }}">
                                Keluarga
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('warga*') ? 'active' : '' }}"
                                href="{{ route('warga.index') }}">
                                Warga
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <hr class="nav-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('pekerjaan*') || request()->is('pendidikan*') || request()->is('talenta*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#collapseKompetensi" role="button"
                    aria-expanded="{{ request()->is('pekerjaan*') || request()->is('pendidikan*') || request()->is('talenta*') ? 'true' : 'false' }}"
                    aria-controls="collapseKompetensi">
                    <span>
                        <img class="logo-sidebar" src="{{ asset('asset/icon/1.svg') }}" alt="home" loading="lazy">
                        Profil Kompetensi
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>

                <div class="collapse {{ request()->is('pekerjaan*') || request()->is('pendidikan*') || request()->is('talenta*') ? 'show' : '' }}"
                    id="collapseKompetensi">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pekerjaan*') ? 'active' : '' }}"
                                href="{{ route('pekerjaan.index') }}">
                                Pekerjaan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pendidikan*') ? 'active' : '' }}"
                                href="{{ route('pendidikan.index') }}">
                                Pendidikan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('talenta*') ? 'active' : '' }}"
                                href="{{ route('talenta.index') }}">
                                Talenta
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <hr class="nav-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-between {{ request()->is('status_warga*') || request()->is('status_keluarga*') || request()->is('status_nikah*') ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#collapseStatus" role="button"
                    aria-expanded="{{ request()->is('status_warga*') || request()->is('status_keluarga*') || request()->is('status_nikah*') ? 'true' : 'false' }}"
                    aria-controls="collapseStatus">
                    <span>
                        <img class="logo-sidebar" src="{{ asset('asset/icon/status.svg') }}" alt="home"
                            loading="lazy">
                        Status
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>

                <div class="collapse {{ request()->is('status_warga*') || request()->is('status_keluarga*') || request()->is('status_nikah*') ? 'show' : '' }}"
                    id="collapseStatus">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('status_warga*') ? 'active' : '' }}"
                                href="{{ route('status_warga.index') }}">
                                Status Warga
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('status_keluarga*') ? 'active' : '' }}"
                                href="{{ route('status_keluarga.index') }}">
                                Status Keluarga
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('status_nikah*') ? 'active' : '' }}"
                                href="{{ route('status_nikah.index') }}">
                                Status Nikah
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</aside>
