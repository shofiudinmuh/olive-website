<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Olive Eatery & Coffee</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/img/olive.png') }}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('olive/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('olive/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('olive/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('olive/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('olive/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('olive/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('olive/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('olive/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>0822 2525 2510</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Senin-Jumat: 12AM - 21PM | Weekend: 11AM -
            22PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          {{-- <li>En</li>
          <li><a href="#">De</a></li> --}}
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="#hero">Olive Eatery & Coffee</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      {{-- <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a> --}}

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Olive Eatery & Coffee</span></h1>
          <h2>Restoran modern dengan konsep Western-Tradisional</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            {{-- <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a> --}}
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in"
          data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        @foreach ($about as $item)
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="{{ $item->foto }}" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{ $item->judul }}</h3>
            <p class="fst-italic">
              {{ $item->desc }}
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>{{ $item->list1 }}</li>
              <li><i class="bi bi-check-circle"></i> {{ $item->list2 }}</li>
              <li><i class="bi bi-check-circle"></i>{{ $item->list3 }}</li>
            </ul>
          </div>
        </div>
        @endforeach

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    {{-- <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Restaurant</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Lorem Ipsum</h4>
              <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Repellat Nihil</h4>
              <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para
                dest</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Ad ad velit qui</h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section --> --}}

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach ($kategori as $item)
              <li data-filter=".filter-{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($menu as $item)
          <div class="col-lg-6 menu-item filter-{{ $item->kategori->nama_kategori }}">
            <img src="{{ $item->foto_menu }}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">{{ $item->nama_menu }}</a><span>Rp. {{ $item->harga }}</span>
            </div>
            <div class="menu-ingredients">
              {{ $item->product_knowladge }}
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              @foreach ($special as $key => $kategori)
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-{{ $key }}">{{ $kategori->nama_menu
                  }}</a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">

              @foreach ($special as $key => $menu)
              <div class="tab-pane {{ $key === 0 ? 'active show' : '' }}" id="tab-{{ $key}}">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>{{ $menu->nama_menu }}</h3>
                    <p class="fst-italic">{{ $menu->product_knowladge }}</p>
                    <p>{{ $menu->desc }}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ $menu->foto_menu }}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events with Olive Eatery & Coffee</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            @foreach ($event as $key => $item)
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{ $item->foto }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>{{ $item->nama_event }}</h3>
                  <div class="price">
                    <p><span>Rp. {{ $item->harga_paket }}</span></p>
                  </div>
                  <p class="fst-italic">{{ $item->desc }}
                  </p>
                  {{-- <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                    </li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p> --}}
                </div>
              </div>
            </div><!-- End testimonial item -->
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    {{--
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book a Table</p>
        </div>

        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up"
          data-aos-delay="100">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4"
                data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone"
                data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4"
                data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4"
                data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people"
                data-rule="minlen:1" data-msg="Please enter at least 1 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your
              reservation. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Book a Table</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section --> --}}

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            @foreach ($testimoni as $item)

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{ $item->review }}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ $item->foto }}" class="testimonial-img" alt="">
                <h3>{{ $item->nama_tester }}</h3>
                <h4>{{ $item->pekerjaan }}</h4>
              </div>
            </div><!-- End testimonial item -->
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Olive Eatery & Coffee</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">
          @foreach ($gallery as $item)

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ $item->foto }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ $item->foto }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Staff</h2>
          <p>Our Proffesional Staff</p>
        </div>

        <div class="row">

          @foreach ($staff as $key => $item)
          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{ $item->foto }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $item->nama_staff }}</h4>
                  <span>{{ $item->jabatan->nama_jabatan }}</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.362167205712!2d111.41038811137332!3d-6.9665320681841845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7741e277fbcea7%3A0x1ca42a7539fe1245!2sOlive%20Eatery%20%26%20Coffee!5e0!3m2!1sid!2sid!4v1688320272956!5m2!1sid!2sid"
          frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi :</h4>
                <p>Jalan RA. Kartini No. 5, Kunden 58212</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Jam Buka:</h4>
                <p>
                  Senin- Jumat:<br>
                  12:00 AM - 21:00 PM
                </p>
                <p>
                  Weekend:<br>
                  11:00 AM - 22:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>oliveeaterycoffee88@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telepon:</h4>
                <p>0822 2525 2510</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-7">
            <div class="footer-info">
              <h3>Olive Eatery & Coffee</h3>
              <p>
                Jalan RA Kartini No. 5 <br>
                58212, Blora<br><br>
                <strong>Telepon:</strong> 0822 2525 2510<br>
                <strong>Email:</strong> oliveeaterycoffee88@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#menu">Menu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#events">Event</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallery</a></li>
            </ul>
          </div>

          {{-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div> --}}

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Olive Eatery & Coffee</span></strong>. All Rights Reserved
      </div>
      {{-- <div class="credits"> --}}
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
        {{--
      </div> --}}
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('olive/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('olive/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('olive/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('olive/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('olive/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('olive/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('olive/assets/js/main.js')}}"></script>

</body>

</html>