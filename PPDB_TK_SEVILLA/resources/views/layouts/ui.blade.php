<!DOCTYPE html>
<html lang="en">

@extends('layouts.head')

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="#"><img src="{{ asset('assets/img/Logo.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ $title === 'home' ? 'active' : '' }}" href="{{ url('/home') }}">Home</a></li>
            @if ($title !== 'home')
            <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="/home/#about">Sejarah Sekolah</a></li>
                <li><a href="/home/#">Visi & Misi</a></li>
                <li><a href="/home/#contact">Kontak Kami</a></li>
                </ul>
            </li>
            @else
            <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="#about">Sejarah Sekolah</a></li>
                <li><a href="#vismis">Visi & Misi</a></li>
                <li><a href="#contact">Kontak Kami</a></li>
                </ul>
            </li>
            @endif

            @if ($title !== 'home')
            <li class="dropdown"><a class="active" href="#"><span>Pendaftaran</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">Jadwal Pendaftaran</a></li>
                    <li><a href="#jenjang">Jenjang Kelas</a></li>
                    <li><a href="#persyaratan">Persyaratan</a></li>
                    <li><a href="#alur">Alur Pendaftaran</a></li>
                    <li><a href="#rincian">Rincian Biaya</a></li>
                    <li><a href="#periode">Periode Pendaftaran</a></li>
                </ul>
            </li>
            @else
            <li class="dropdown"><a class="" href="#"><span>Pendaftaran</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="/jadwal-pendaftaran">Jadwal Pendaftaran</a></li>
                    <li><a href="/jadwal-pendaftaran/#jenjang">Jenjang Kelas</a></li>
                    <li><a href="/jadwal-pendaftaran/#persyaratan">Persyaratan</a></li>
                    <li><a href="/jadwal-pendaftaran/#alur">Alur Pendaftaran</a></li>
                    <li><a href="/jadwal-pendaftaran/#rincian">Rincian Biaya</a></li>
                    <li><a href="/jadwal-pendaftaran/#periode">Periode Pendaftaran</a></li>
                </ul>
            </li>
            @endif

          <li>
            @if(Auth::check())
                @if(Auth::user()->user_type == 2)
                    <a href="{{ url('/siswa/profile') }}" class="getstarted scrollto">Dashboard</a>
                @elseif (Auth::user()->user_type == 1)
                    <a href="{{ url('admin/dashboard') }}" class="getstarted scrollto">Dashboard</a>
                @endif
                @else
                    <a href="{{ url('/login') }}" class="getstarted scrollto">Login</a>
            @endif
        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

    @yield('hero')

    <main id="main">
        @yield('main')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Rizal</strong>. All Rights Reserved {{ date('Y') }}
                    </div>
                </div>
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        Made With <span>❤</span> by Rizal
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    <script>
        function cardsCenter() {
            /* testimonial one function by = owl.carousel.js */
            jQuery('.card-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    991: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1600: {
                        items: 1
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });

        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <script>
        var serverClock = jQuery("#jamServer");
        if (serverClock.length > 0) {
            showServerTime(serverClock, serverClock.text());
        }

        function showServerTime(obj, time) {
            var parts = time.split(":"),
                newTime = new Date();

            newTime.setHours(parseInt(parts[0], 10));
            newTime.setMinutes(parseInt(parts[1], 10));
            newTime.setSeconds(parseInt(parts[2], 10));

            var timeDifference = new Date().getTime() - newTime.getTime();
            var methods = {
                displayTime: function() {
                    var now = new Date(new Date().getTime() - timeDifference);
                    obj.text([
                        methods.leadZeros(now.getHours(), 2),
                        methods.leadZeros(now.getMinutes(), 2),
                        methods.leadZeros(now.getSeconds(), 2)
                    ].join(":"));
                    setTimeout(methods.displayTime, 500);
                },

                leadZeros: function(time, width) {
                    while (String(time).length < width) {
                        time = "0" + time;
                    }
                    return time;
                }
            }
            methods.displayTime();
        }
    </script>

    <script>
        $(document).on('click', '#btn-delete', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                title: 'Apakah Kamu Yakin Untuk Menghapus Data Tersebut?',
                text: "Kamu tidak bisa mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                //confirmButtonColor: '#3085d6',
                //cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus itu!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })

        $(document).on('click', '#btn-update', function(e) {
            e.preventDefault();
            var link = $(this).attr('method');

            Swal.fire({
                title: 'Do you want to save the changes?',
                icon: 'info',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = link;
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })
    </script>

</body>

</html>
