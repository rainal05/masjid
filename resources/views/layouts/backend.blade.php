<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SISTEM INFROMASI BANTUAN HIBAH</title>
    <link href="" rel="icon">
    <link href="{{ asset('backend') }}/dist/css/styles.css" rel="stylesheet" />
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="">BANTUAN HIBAH</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li>
                <a class="text-white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
            </li>
        </ul>
    </nav>
    <nav>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li>
                <a class="text-white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        @if (auth()->user()->role == 'Admin')
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Halaman Admin</div>
                            <a class="nav-link" href="{{ url('home', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Beranda
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Master</div>
                            <a class="nav-link" href="{{ url('data/masjid', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                                Data Masjid
                            </a>
                            <a class="nav-link" href="{{ url('data/konten', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                Data Konten
                            </a>
                            <div class="sb-sidenav-menu-heading">Laporan</div>
                            <a class="nav-link" href="{{ url('laporan', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Laporan Masjid
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Akun</div>
                            <a class="nav-link" href="{{ url('data/akun', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Akun
                            </a>
                            <div class="sb-sidenav-menu-heading" data-toggle="modal" data-target="#logoutModal"><i
                                    class="fas fa-sign-out-alt"></i> Keluar Aplikasi</div>
                        </div>
                    </div>
                </nav>
            </div>
        @endif
        @if (auth()->user()->role == '0')
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Halaman Admin</div>
                            <a class="nav-link" href="{{ url('home', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Beranda
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Masjid</div>
                            <a class="nav-link" href="{{ url('data/masjid/acc', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                ACC
                            </a>
                            <a class="nav-link" href="{{ url('data/masjid', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-times"></i></div>
                                Belum ACC
                            </a>
                            <div class="sb-sidenav-menu-heading" data-toggle="modal" data-target="#logoutModal"><i
                                    class="fas fa-sign-out-alt"></i> Keluar Aplikasi</div>
                        </div>
                    </div>
                </nav>
            </div>
        @endif
        <div id="layoutSidenav_content">

            @yield('content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="text-center">Copyright &copy; <strong>BANTUAN HIBAH</strong></div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" Jika ingin keluar Aplikasi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-sm btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Logout --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/form.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('backend') }}/dist/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/dist/assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('backend') }}/dist/assets/demo/chart-bar-demo.js"></script>
    {{-- batas --}}
    <script src="{{ asset('backend') }}/dist/assets/demo/ser.js"></script>
    {{-- batas --}}
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/dist/assets/demo/datatables-demo.js"></script>
    @yield('grafik')
    {{-- clone --}}
    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    //$(wrapper).clone().prependTo('.clone')
                    //$(wrapper).clone().appendTo('.clone').append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                    $(wrapper).clone().appendTo('.clone'); //add input box
                }
            });

            // $('.clone').on("click",".remove_field", function(e){ //user click on remove text
            // 	e.preventDefault(); $(this).parent('div.input_fields_wrap').remove(); x--;
            // });
            $('.wrap').on("click", ".remove_field", function() {
                //alert('ok');
                $('.wrap').find('.input_fields_wrap').not(':first').last().remove();
            });
        });
    </script>
    {{-- and clone --}}
</body>

</html>
