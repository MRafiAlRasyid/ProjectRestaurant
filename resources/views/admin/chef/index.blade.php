<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin - Bistro Eclat</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a class="logo">
                    Bistro Eclat
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false"><span>{{ auth()->user()->username }}</span></span> </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <div class="user-box">
                                        <div class="u-text">
                                            <h4>{{ auth()->user()->username }}</h4>
                                            <p class="text-muted">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('login.logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-lg btn-block">
                                        <p>Logout</p>
                                    </button>
                                </form>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}">
                            <i class="la la-dashboard"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.menu.index') }}">
                            <i class="la la-dashboard"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('admin.chef.index') }}">
                            <i class="la la-dashboard"></i>
                            <p>Chef</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tables.index') }}">
                            <i class="la la-dashboard"></i>
                            <p>Tables</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.booking.index') }}">
                            <i class="la la-dashboard"></i>
                            <p>Booking</p>
                        </a>
                    </li>
                    <li class="nav-item update-pro">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="la la-rocket text-light"></i>
                            <p class="text-light">Website</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">Chef</h4>
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>List Chef</h4>
                                    <div class="card-header-action">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#addChefModal">
                                            Tambah Chef <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addChefModal" tabindex="-1" role="dialog"
                                        aria-labelledby="addChefModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addChefModalLabel">Tambah Chef</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.chef.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h6>Nama</h6>
                                                        <input type="text" name="nama" id="nama" class="w-100 mb-3">

                                                        <h6>Posisi</h6>
                                                        <input type="text" name="posisi" id="posisi" class="w-100 mb-3">

                                                        <h6>Gambar</h6>
                                                        <input type="file" name="gambar" id="gambar" class="w-100 mb-3">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-primary">
                                    <b>{{ Session::get('success') }}</b>
                                </div>
                                @endif
                                <div class="card-body p-0">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($chefs as $c)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset("asset-gambar/$c->gambar") }}" alt="image" class="img-thumbnail"
                                                    style="width: 100px;">
                                                  </td>
                                                <td>{{ $c->nama }}</td>
                                                <td>{{ $c->posisi }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-action mr-1"
                                                        data-toggle="modal" data-target="#editChefModal{{ $c->id }}"
                                                        data-toggle="tooltip" title="Edit">
                                                        <i class="la la-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-action" data-toggle="modal"
                                                        data-target="#deleteChefModal{{ $c->id }}" data-toggle="tooltip"
                                                        title="Delete">
                                                        <i class="la la-times"></i>
                                                    </button>
                                                    <form action="{{ route('admin.chef.destroy', $c->id) }}"
                                                        method="POST" id="form-delete-{{ $c->id }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <!-- Edit Chef Modal -->
                                                    <div class="modal fade" id="editChefModal{{ $c->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="editChefModalLabel{{ $c->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editChefModalLabel{{ $c->id }}">Edit Chef
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.chef.update', $c->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <h6 class="text-start">Nama</h6>
                                                                        <input type="text" name="nama" id="nama"
                                                                            class="w-100 mb-3" value="{{ $c->nama }}">

                                                                        <h6 class="text-start">Posisi</h6>
                                                                        <input type="text" name="posisi" id="posisi"
                                                                            class="w-100 mb-3" value="{{ $c->posisi }}">
                                                                            <h6>Gambar</h6>
                                                                            <img src="{{ asset("asset-gambar/$c->gambar") }}" alt="image" class="img-thumbnail"
                                                                            style="max-width: 25vw;">
                                                                            <input type="file" name="gambar" id="gambar" class="w-100 mb-3">
                                                                        <button type="submit"
                                                                            class="btn btn-primary text-start">Update</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal Hapus Chef -->
                                                    <div class="modal fade" id="deleteChefModal{{ $c->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteChefModalLabel{{ $c->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteChefModalLabel{{ $c->id }}">Hapus Chef
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus chef ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        onclick="konfirmasiHapus({{ $c->id }})">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ml-auto">
                        2024, made with <i class="la la-heart heart text-danger"></i> by <a href="https://github.com/MRafiAlRasyid/MRafiAlRasyid">Muhammad Rafi Al Rasyid</a>
                    </div>				
                </div>
            </footer>
        </div>
    </div>
    </div>


    <script>
        function konfirmasiHapus(chefId) {
            document.getElementById('form-delete-' + chefId).submit();
        }
    </script>
</body>
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/ready.min.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>

</html>