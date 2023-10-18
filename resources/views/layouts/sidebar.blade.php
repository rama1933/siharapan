<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            @if (Auth::user()->hasRole('admin'))
                <ul id="sidebarnav">
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home') }}"
                            aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                class="hide-menu">Dashboard</span></a></li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">MASTER</span></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('satuan.index') }}"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Satuan
                            </span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('komoditi.index') }}"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Komoditi
                            </span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('bapo.index') }}"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Bahan Pokok
                            </span></a>
                    </li>
                    <li class="nav-small-cap"><span class="hide-menu">HARGA</span></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('harga.kandangan.index') }}"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Harga
                            </span></a>
                    </li>

                    <li class="nav-small-cap"><span class="hide-menu">Berita</span></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('berita.index') }}"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Berita
                            </span></a>
                    </li>
                </ul>
            @endif
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
