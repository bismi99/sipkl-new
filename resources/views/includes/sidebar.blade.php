<!-- Sidebar Holder -->
<nav id="sidebar" class="c-border-right shadow">
    <ul class="list-unstyled components ">
        <li class="m-0">
            <div class="d-flex ">
                <a href="#" class="pt-3 text-decoration-none">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" class="mx-3" class="img-fluid" width="50">
                    <span class="h4 text-success font-weight-bold">SIPKL</span>
                </a>
            </div>
        </li>
        <li>
            <div class="line"></div>
        </li>
        <li>
            <a class="a-link" href="{{ route('dashboard.index') }}">
                <i class="mr-3 fas fa-th-large"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a class="a-link" href="{{ route('kegiatan.index') }}">
                <i class="mr-3 fas fa-list"></i>
                <span>Kegiatan</span>
            </a>
        </li>
        <li>
            <a class="a-link" href="{{ route('laporan.index') }}">
                <i class="mr-3 fas fa-file"></i>
                <span>Laporan PKL</span>
            </a>
        </li>
        <li>
            <a class="a-link" href="{{ route('tempat.index') }}">
                <i class="mr-3 fas fa-building"></i>
                <span>Tempat PKL</span>
            </a>
        </li>
        <li>
            <a class="a-link" href="{{ route('users.index') }}">
                <i class="mr-3 fas fa-users"></i>
                <span>Manage User</span>
            </a>
        </li>
        <li>
            <div class="line"></div>
        </li>

        {{-- user card --}}
        <li>
            <div class="card text-center shadow-sm mt-5">
                <div class="card-header text-right py-1">
                    <div class="dropdown">
                        <a class="btn btn-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-secondary"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                            <button type="button" data-toggle="modal" data-target="#modalChangePassword"
                                class="dropdown-item">Change Password</button>
                            <button type="button" data-toggle="modal" data-target="#modalLogout"
                                class="dropdown-item">Logout</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <div class="wrapper-sm-img">
                        <img src="{{ url('/avatar/' . Auth::user()->profile->avatar) }}" alt="profile"
                            class="img-fluid">
                    </div>
                </div>
                <span class="text-capitalize">{{ __(Auth::user()->name) }}</span>
                <span class="text-secondary mb-3">{{ Auth::user()->email }}</span>
            </div>
        </li>
        {{-- //user card --}}

        <li>
            <footer class="mt-5 text-center">
                <p>
                    <small class="text-muted ">
                        &copy; 2021 Yayasan Asahabah Alkiram Alislami.
                    </small>
                </p>
            </footer>
        </li>

    </ul>

</nav>
