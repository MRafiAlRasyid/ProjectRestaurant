<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bistro Eclat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>


        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Bistro Eclat</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ url("/") }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url("/about") }}" class="nav-item nav-link">About</a>
                        <a href="{{ url("/menu") }}" class="nav-item nav-link">Menu</a>
                        <a href="{{ url("/team") }}" class="nav-item nav-link">Team</a>
                        <a href="{{ url("/booking") }}" class="nav-item nav-link active">Booking</a>
                    </div>
                    <ul class="navbar-nav ms-auto py-0 pe-4">
                        @guest
                        @if (Route::has('login.index'))
                        <li class="nav-item">
                            <a href="{{ route('login.index') }}" class="btn btn-primary py-2 mx-1 px-4">Login</a>
                        </li>
                        @endif
                        @else
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->username }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item has-icon"><i class="fas fa-sign-out-alt"></i> Dashboard</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('login.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Book A Table Online</h1>
                        @if (Session::has('success'))
                        <div class="alert alert-primary">
                            <b>{{ Session::get('success') }}</b>
                        </div>
                        @endif
                        <form id="bookingForm" action="{{ route('booking.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstname" placeholder="Nama"
                                            name="first_name">
                                        <label for="nama">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="lastname" placeholder="Nama"
                                            name="last_name">
                                        <label for="nama">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="no_hp" id="no_hp"
                                            placeholder="Nomor Handphone">
                                        <label for="no_hp">Nomor Handphone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating" id="date3" data-target-input="nearest">
                                        <input type="date" class="form-control" id="datetime" placeholder="Date & Time"
                                            name="tgl_booking" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="table" name="table">
                                            @foreach ($tables as $t)
                                            <option value="{{ $t }}">{{ $t }}</option>
                                            @endforeach
                                        </select>
                                        <label for="table">Nama Table</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message"
                                            style="height: 100px" name="message"></textarea>
                                        <label for="message">Special Request (Opsional)</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="button" onclick="showModal()">Pesan
                                        Sekarang</button>
                                </div>
                            </div>
                        </form>

                        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bookingModalLabel">Detail Pemesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Lengkap :</strong> <span id="modalFullName"></span></p>
                                        <p><strong>Email :</strong> <span id="modalEmail"></span></p>
                                        <p><strong>No. Hp :</strong> <span id="modalNoHp"></span></p>
                                        <p><strong>Nama Meja :</strong> <span id="modalNamaMeja"></span></p>
                                        <p><strong>Pesan :</strong> <span id="modalPesan"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onclick="downloadData()">Download</button>
                                        <button type="submit" class="btn btn-primary"
                                            onclick="submitForm()">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                                allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="{{ url('/') }}">Home</a>
                        <a class="btn btn-link" href="{{ url('about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ url('menu') }}">Menu</a>
                        <a class="btn btn-link" href="{{ url('team') }}">Our Team</a>
                        <a class="btn btn-link" href="{{ url('booking') }}">Reservation</a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Dayeuhkolot, Bandung, Indonesia</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 857-0022-6261</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>rafialrasyidr98@gmail.com</p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Sunday</h5>
                        <p>00.00 - 24.00</p>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
        function showModal() {
            var fullName = document.getElementById('firstname').value + ' ' + document.getElementById('lastname').value;

            document.getElementById('modalFullName').innerText = fullName;
            document.getElementById('modalEmail').innerText = document.getElementById('email').value;
            document.getElementById('modalNoHp').innerText = document.getElementById('no_hp').value;
            document.getElementById('modalNamaMeja').innerText = document.getElementById('table').value;
            document.getElementById('modalPesan').innerText = document.getElementById('message').value;

            var myModal = new bootstrap.Modal(document.getElementById('bookingModal'));
            myModal.show();
        }

        function downloadData() {
        var dataToDownload = "Nama Lengkap: " + document.getElementById('firstname').value + ' ' + document.getElementById('lastname').value + "\n" +
            "Email: " + document.getElementById('email').value + "\n" +
            "No. Hp: " + document.getElementById('no_hp').value + "\n" +
            "Nama Meja: " + document.getElementById('table').value + "\n" +
            "Pesan: " + document.getElementById('message').value + "\n";
        var blob = new Blob([dataToDownload], { type: 'text/plain' });
        var url = window.URL.createObjectURL(blob);

        var a = document.createElement('a');
        a.href = url;
        a.download = 'booking_data.txt';
        document.body.appendChild(a);

        a.click();

        document.body.removeChild(a);
        }

        function submitForm() {
            document.getElementById('bookingForm').submit();
        }
    </script>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>