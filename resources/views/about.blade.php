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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

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
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Bistro Eclat</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ url("/") }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url("/about") }}" class="nav-item nav-link active">About</a>
                        <a href="{{ url("/menu") }}" class="nav-item nav-link">Menu</a>
                        <a href="{{ url("/team") }}" class="nav-item nav-link">Team</a>
                        <a href="{{ url("/booking") }}" class="nav-item nav-link">Booking</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Bistro Eclat</h1>
                        <p class="mb-4">
                            Bistro Eclat memiliki sejarah yang kaya dan inspiratif, memulai perjalanan kuliner yang mengukir jejaknya dalam dunia gastronomi. Cerita kami dimulai pada tahun 2009, ketika <Strong>M Rafi Al Rasyid</Strong> membawa visi dan misi untuk menciptakan tempat di mana seni kuliner dan keindahan hidangan bersatu dalam harmoni.
                        </p>
                        <p class="mb-4">Dengan hasrat akan keahlian kuliner tingkat tinggi dan dedikasi untuk memberikan pengalaman tak terlupakan kepada para tamu, Bistro Eclat segera menjadi tempat yang dikenal karena kreativitas, inovasi, dan rasa autentik.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15
                                    </h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $teamsCount }}
                                    </h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 align-items-center mt-3">
                    <div class="col-lg-6">
                        <p class="mb-4">Seiring berjalannya waktu, restoran ini telah berkembang menjadi destinasi kuliner yang dikenal luas, tidak hanya untuk hidangan lezatnya tetapi juga karena suasana yang elegan dan pelayanan yang luar biasa. Setiap hidangan di Bistro Eclat adalah hasil dari penelitian mendalam dan dedikasi dalam mengolah bahan-bahan terbaik.</p>
                        <p class="mb-4">Pencapaian kami tidak hanya tercermin dalam penghargaan yang diterima, tetapi juga dalam cerita-cerita hangat dari para tamu yang telah merasakan pesona Bistro Eclat. Kami terus berkembang, berinovasi, dan menghadirkan pengalaman makan yang lebih memukau bagi semua pengunjung setia dan mereka yang baru pertama kali menjejakkan kaki di Bistro Eclat.</p>
                        <p class="mb-4">Sebagai bagian dari perjalanan kami, kami berterima kasih kepada seluruh tim yang berdedikasi dan tentu saja kepada Anda, para tamu setia, yang telah membuat Bistro Eclat menjadi rumah bagi cita rasa yang tak terlupakan. Mari bersama-sama terus menulis bab baru dalam sejarah Bistro Eclat, menghadirkan kelezatan dan kebahagiaan dalam setiap kunjungan Anda.</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/pexels-dmitry-zvolskiy-2253643.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/pexels-flo-dahm-541216.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/pexels-kaboompics-com-6267.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/pexels-rene-asmussen-1581384.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        

        <!-- Footer Start -->
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
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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