@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">


                    <h1 class="hero-title mb-4">Sistem Informasi Pemetaan Tempat Wisata di Kota
                        Kendari</h1>

                    <p class="hero-description mb-4">Selamat Datang di Sistem Informasi Pemetaan Tempat Wisata di
                        Kota
                        Kendari. Temukan informasi tempat wisata menarik di Kota Kendari secara interaktif!</p>

                    <div class="cta-wrapper">
                        <a href="#" class="btn btn-primary">Lihat Peta Wisata</a>
                        <a href="#" class="btn btn-success">Daftar Wisata</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="{{ asset('assets/img/hero_kmi.png') }}" alt="Business Growth" class="img-fluid"
                            loading="lazy" style="max-height: 500px; object-fit: contain; width: 100%;">
                    </div>
                </div>
            </div>
            <div class="row feature-boxes">
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
                            📍
                        </div>
                        <div class="feature-content">
                            <h4> Pemetaan Interaktif</h4>
                            <p>Lihat lokasi wisata langsung di peta dengan filter berdasarkan jenis dan wilayah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
                            📋
                        </div>
                        <div class="feature-content">
                            <h4> Data Lengkap</h4>
                            <p>Akses informasi detail tentang destinasi wisata favorit di sekitarmu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-box">
                        <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
                            ⭐
                        </div>
                        <div class="feature-content">
                            <h4> Penilaian & Rating</h4>
                            <p>Lihat rating wisata dari pengunjung lain untuk menentukan pilihan terbaik.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Hero Section -->
    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Keunggulan</h2>
            <p>Website Kami memiliki beberapa keunggulan diantaranya sebagai berikut</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center g-5">

                <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <div class="service-content">
                            <h3>Visualisasi Lokasi Wisata yang Interaktif</h3>
                            <p>Pengguna dapat melihat lokasi objek wisata secara langsung di peta digital yang interaktif,
                                sehingga memudahkan dalam merencanakan perjalanan dan menentukan rute tercepat.</p><a
                                href="#" class="service-link">

                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-left" data-aos-delay="100">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-phone-fill"></i>
                        </div>
                        <div class="service-content">
                            <h3>Informasi Lengkap dan Terintegrasi</h3>
                            <p>Setiap titik wisata dilengkapi dengan informasi penting seperti deskripsi tempat, jam
                                operasional, fasilitas yang tersedia, serta ulasan dari pengunjung lain.</p>
                            <a href="#" class="service-link">

                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-palette2"></i>
                        </div>
                        <div class="service-content">
                            <h3>Peningkatan Promosi Wisata Lokal</h3>
                            <p>Aplikasi ini membantu promosi destinasi wisata di Kota Kendari secara lebih luas, menjangkau
                                wisatawan lokal maupun mancanegara melalui platform digital yang mudah diakses.</p>
                            <a href="#" class="service-link">

                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>
                        <div class="service-content">
                            <h3>Dukungan Pengambilan Keputusan oleh Pemerintah</h3>
                            <p>SIG ini membantu pemerintah daerah dalam analisis penyebaran, potensi, dan pengembangan
                                kawasan wisata berdasarkan data spasial yang akurat dan real-time.</p>
                            <a href="#" class="service-link">

                            </a>
                        </div>
                    </div>
                </div><!-- End Service Item -->


            </div>

        </div>

    </section>

@endsection
