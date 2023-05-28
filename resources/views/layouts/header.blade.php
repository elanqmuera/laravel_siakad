<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('buat_tugas') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Buat Tugas
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown item">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Data Master
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('dosen') }}/">
                                        Data Dosen
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mahasiswa') }}">
                                        Data Mahasiswa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('kelas') }}">
                                        Data Kelas
                                    </a>
                                </div>

                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('matkul') }}">
                                        Data Mata Kuliah
                                    </a>
                                    <a class="dropdown-item" href="{{ route('jurusan') }}">
                                        Data Jurusan
                                    </a>
                                    <a class="dropdown-item" href="{{ route('tahunajaran') }}">
                                        Tahun Ajaran
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item dropdown item">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Tugas Mahasiswa
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('pertemuan') }}/">
                                        Buat Pertemuan
                                    </a>
                                    <a class="dropdown-item" href="{{ route('tugas') }}">
                                        Tugas
                                    </a>

                                </div>

                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('tugasMahasiswa') }}">
                                        Daftar Tugas Mahasiswa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('nilai') }}">
                                        Nilai
                                    </a>

                                </div>
                            </div>
                        </div>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Extra
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/empty.html">
                                        Empty page
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/cookie-banner.html">
                                        Cookie banner
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/activity.html">
                                        Activity
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/gallery.html">
                                        Gallery
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/invoice.html">
                                        Invoice
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/search-results.html">
                                        Search results
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/pricing.html">
                                        Pricing cards
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/pricing-table.html">
                                        Pricing table
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/faq.html">
                                        FAQ
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/users.html">
                                        Users
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/license.html">
                                        License
                                    </a>
                                </div>
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/logs.html">
                                        Logs
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/music.html">
                                        Music
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/photogrid.html">
                                        Photogrid
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/tasks.html">
                                        Tasks
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/uptime.html">
                                        Uptime monitor
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/widgets.html">
                                        Widgets
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/wizard.html">
                                        Wizard
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/settings.html">
                                        Settings
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/trial-ended.html">
                                        Trial ended
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/job-listing.html">
                                        Job listing
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ asset('tabler/demo') }}/page-loader.html">
                                        Page loader
                                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>


                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="{{ asset('tabler/demo') }}/" method="get" autocomplete="off" novalidate>
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                            </span>
                            <input type="text" value="" class="form-control" placeholder="Search…"
                                aria-label="Search in website">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
