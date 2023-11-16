<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @if (auth()->user()->role == 1)
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.route') }}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                            <li class="list-divider"></li>
                        @endif
                        @if (auth()->user()->role == 2)
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('kasir.route') }}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                class="hide-menu">Dashboard</span></a></li>
                            <li class="list-divider"></li>
                        @endif
                        @if (auth()->user()->role == 1)
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Akun </span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <li class="sidebar-item"><a href="{{ route('pelanggan.index') }}" class="sidebar-link"><span
                                            class="hide-menu"> Pelanggan
                                        </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="{{ route('kasir.index') }}" class="sidebar-link"><span
                                            class="hide-menu"> Kasir
                                        </span></a>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
                                    class="hide-menu">Menu </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{ route('makanan.index') }}" class="sidebar-link"><span
                                            class="hide-menu"> Makanan
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{ route('minuman.index') }}" class="sidebar-link"><span
                                            class="hide-menu"> Minuman
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('meja.index') }}"
                                aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                    class="hide-menu">Meja
                                </span></a>
                        </li>
                       @if (auth()->user()->role == 1)
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">Landing Page </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="ui-buttons.html" class="sidebar-link"><span
                                            class="hide-menu"> Carousel
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="ui-modals.html" class="sidebar-link"><span
                                            class="hide-menu"> Tentang Kami </span></a>
                                </li>
                                <li class="sidebar-item"><a href="ui-tab.html" class="sidebar-link"><span
                                            class="hide-menu"> Kontak </span></a></li>
                            </ul>
                        </li>
                       @endif

                        <li class="list-divider"></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('pesanan.index') }}"
                                aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                                    class="hide-menu">Pesanan
                                </span></a>
                        </li>
                        {{-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{ route('admin.laporan') }}" aria-expanded="false"><i data-feather="lock"
                                    class="feather-icon"></i><span class="hide-menu">Laporan
                                </span></a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
