<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bistro Eclat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

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
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <a href="{{ route("home") }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ url("/about") }}" class="nav-item nav-link">About</a>
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
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
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
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Foods</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2"> Tempat di mana seni kuliner bertemu dengan keajaiban rasa. Nikmati suasana yang elegan dan hidangan kreatif yang memanjakan selera Anda, sebuah perjalanan rasa yang tak terlupakan.</p>
                            <a href="{{ route('booking') }}"
                                class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Master Chefs</h5>
                                <p>Chef kami bukan hanya ahli dalam seni memasak, tetapi juga seniman rasa yang menciptakan kreasi kuliner berkelas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Quality Food</h5>
                                <p>Menu kami tidak hanya sekedar makanan, melainkan karya seni rasa yang menciptakan perpaduan antara tradisi dan inovasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Online Order</h5>
                                <p>Akses menu lengkap Bistro Eclat secara online, dengan menu sesuai dengan gambar dan deskripsi yang jelas untuk setiap hidangan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>24/7 Service</h5>
                                <p>Nikmati kelezatan khas Bistro Eclat setiap saat, karena kami menyediakan menu lengkap yang dapat dinikmati 24 jam sehari, 7 hari seminggu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                                    src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s"
                                    src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                                    src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"
                                    src="img/about-4.jpg">
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
                        <a class="btn btn-primary py-3 px-5 mt-2" href="{{ url('about') }}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                @forelse ($menus as $m)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset("asset-gambar/$m->image") }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>{{ $m->nama_makanan }}</span>
                                                <span class="text-primary">{{ $m->harga }}</span>
                                            </h5>
                                            <small class="fst-italic">{{ $m->deskripsi }}</small>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12 text-center">
                                    <h3>No data available</h3>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->


        {{-- <!-- Reservation Start -->
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
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="datetime"
                                            placeholder="Date & Time" data-target="#date3"
                                            data-toggle="datetimepicker" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select1">
                                            <option value="1">People 1</option>
                                            <option value="2">People 2</option>
                                            <option value="3">People 3</option>
                                        </select>
                                        <label for="select1">No Of People</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message"
                                            style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
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
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                                allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start --> --}}


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                    <h1 class="mb-5">Our Master Chefs</h1>
                </div>
                <div class="row g-4">
                    @forelse ($teams as $t)
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="team-item text-center rounded overflow-hidden mb-5">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid " src="{{ asset("asset-gambar/$t->gambar") }}" style="width: 200px; height: 200px;" alt="">
                            </div>
                            <h5 class="mb-0">{{ $t->nama }}</h5>
                            <small>{{ $t->posisi }}</small>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <h3>No data available</h3>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Team End -->


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
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('ib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>