@extends('layouts.head')
@extends('layouts.ui')

@section('title')
PPDB
@endsection

@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up" style="color: #3498db">PPDB Online</h1>
          <h2 data-aos="fade-up" data-aos-delay="400" style="color: #3498db">Ayo Segera Daftar Kuota Terbatas !</h2>
          <h1 data-aos="fade-up" data-aos-delay="400">TK ISLAM SEVILLA AL FATAH</h1>
          <h5 data-aos="fade-up" data-aos-delay="400">Akreditasi: B</h5>
          <div class="mt-3 pt-4" data-aos="fade-up" data-aos-delay="700">
            @if(Auth::check())
                @if(Auth::user()->user_type == 2)

                @elseif (Auth::user()->user_type == 1)

                @endif
                @else
                    <h4 data-aos="fade-up" data-aos-delay="400"><strong>Jika belum mempunyai akun DAFTAR terlebih dahulu.</strong></h4>
                    <a href="{{ url('/registrasi') }}" class="btn-get-started scrollto">Daftar | Siswa</a>
            @endif

          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{ asset('/assets/img/hero-img2.png') }}" class="img-fluid animated" alt="hero-img">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endsection

@section('main')
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container mt-5">

        <div class="section-title" data-aos="fade-up">
          <h2>Sejarah Sekolah</h2>
        </div>

        <div class="row content">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
            <p>
              Taman Kanak-Kanak Sevilla Al-Fatah  merupakan Sekolah Taman Kanak-Kanak yang berada dibawah naungan Dewan Pengelola dan Pendidikan Masjid Al-Fatah Yayasan Istiqomah. Program pembelajaran yang dilaksanakan berbasis agama Islam. TK Sevilla Al-Fatah berdiri pada tanggal 1 Oktober 2004. Status gedung permanen milik jama’ah Masjid Al-Fatah yang memberikan izin untuk pengelolaan TK Sevilla Al-Fatah dengan luas lahan 153m2. Berada ditengah komplek Masjid Al-Fatah dengan beberapa gedung yang pertama hanya digunakan untuk Taman Pendidikan Al-Fatah (TPA) Al-Qur’an.
            </p>
            <p>
              Melihat kondisi dimana beberapa gedung yang masih kosong maka jama’ah masjid Al-Fatah berkeinginan untuk memanfaatkan gedung tersebut untuk dikelola. Pengurus Masjid Al-Fatah bekerjasama dengan TK Sevilla Samarinda untuk mendirikan lembaga Taman Kanak-Kanak. Akhirnya pelaksanaan pendirian TK terlaksana dengan memperkerjakan tenaga pendidik setempat yang kemudian di beri training di TK Sevilla Samarinda.
            </p>
            <p>
              Letak geografis Taman Kanak-Kanak Sevilla Al-Fatah berada di Kecamatan Balikpapan Barat, Kelurahan Margomulyo, letaknya cukup strategis karena berada di lingkungan Masjid Al-Fatah, dan berada di lingkungan perumahan warga yang memiliki banyak anak kecil, serta kondisi lingkungan yang sehat, jauh dari polusi.
            </p>
          </div>
      </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Visi & Misi Section ======= -->
    <section id="vismis" class="about">
      <div class="container mt-5">

        <div class="section-title" data-aos="fade-up">
          <h2>Visi & Misi</h2>
        </div>

        {{-- <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita et velit nesciunt, quos natus reprehenderit obcaecati ex totam deserunt inventore dolorum aut doloremque! Placeat eius id aliquam tempora culpa magni?</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <ul>
                <li>1</li>
                <li>1</li>
                <li>1</li>
            </ul>
          </div> --}}
      </div>
    </section>
    <!-- End Visi & Misi Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container mt-5">

        <div class="section-title" data-aos="fade-up">
          <h2>Kontak Kami</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Assalamualaikum Ayah Bunda!</h3>
              <p>Yuk ikuti Sosial Media kami untuk mendapatkan informasi yang lebih banyak!</p>
              <div class="social-links">
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/tk_sevillaalfatah" class="instagram"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>Komperta GN. IV Jl. Batu Butok II <br>Kelurahan Margo Mulyo, Kecamatan Balikpapan Barat, Kota Balikpapan, Kalimantan Timur, 76125</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>safbpp@gmail.com</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <a href="https://wa.me/6281347153808">
                    <p><strong>+62 813 4715 3808</strong></p>
                </a>
              </div>

            </div>
          </div>
          <!-- Start Map -->
          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.9080579886468!2d116.82555627421607!3d-1.2239188355595603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df147dbdbeb9d03%3A0x7442803484c68a0!2sTK%20ISLAM%20SEVILLA%20AL%20FATAH!5e0!3m2!1sid!2sid!4v1686664605794!5m2!1sid!2sid" width="550" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <!-- End Map -->
        </div>

      </div>
    </section>
    <!-- End Contact Section -->


@endsection
