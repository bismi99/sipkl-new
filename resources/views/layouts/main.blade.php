<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <title>SIPKL</title>
    @include('includes.style')
</head>

<body>
    <div class="wrapper container-fluid overflow-hidden p-0">
        @include('includes.sidebar')

        <!-- Page Content Holder -->
        <div id="content">
            <div class="mb-5">
                <div class="c-border bg-white p-3 mr-3 shadow-sm">
                    <button type="button" id="sidebarCollapse" class="btn bg-transparent p-0">
                        <i class="fas fa-bars h2 mb-0 text-secondary"></i>
                    </button>
                    <span class="pl-3">Selamat Datang di Sistem Informasi PKL</span>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    {{-- modal change password --}}
    <div class="modal fade" id="modalChangePassword" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalChangePasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalChangePasswordLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.changePassword', Auth::user()->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label class="mb-1" for="oldPassword">Old Password</label>
                            <input id="oldPassword" type="password"
                                class="form-control rounded-pill @error('oldPassword') is-invalid @enderror"
                                name="oldPassword" required autocomplete="oldPassword">

                            @error('oldPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="mb-1" for="password">New Password</label>
                            <input id="password" type="password"
                                class="form-control rounded-pill @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="password-confirm">Confirm New Password</label>
                            <input id="password-confirm" type="password" class="form-control rounded-pill"
                                name="password_confirmation" autocomplete="new-password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-pill">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal logout --}}
    <div class="modal fade" id="modalLogout" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalLogoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLogoutLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-capitalize">apakah anda yakin untuk melakukan logout ???</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                    <a href="{{ url('/logout') }}" class="btn btn-primary rounded-pill">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('includes.script')

</body>

</html>
