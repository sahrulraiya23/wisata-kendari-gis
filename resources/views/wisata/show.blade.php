@extends('layouts.app')

@section('title', 'Detail Wisata: ' . $wisata->nama)

@section('content')
    <main id="main">

        <div class="container d-flex justify-content-center" style="padding-top: 100px;">
            <div class="row text-center">
                <h2 class="fw-bold text-primary">
                    <i class="fas fa-map-marked-alt me-2"></i>
                    {{-- Menampilkan nama wisata secara dinamis --}}
                    {{ $wisata->nama }}
                </h2>
                <p class="text-muted">Jelajahi detail destinasi wisata menarik di daerah kami.</p>
            </div>
        </div>

        <section id="portfolio-details" class="portfolio-details section">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    <div class="col-lg-7">
                        <div class="portfolio-details-slider swiper rounded shadow-lg">
                            <div class="swiper-wrapper align-items-center">
                                @if ($wisata->gambar)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}"
                                            class="img-fluid">
                                    </div>
                                @else
                                    <div class="swiper-slide">
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="height: 450px;">
                                            <i class="bi bi-image-alt fs-1 text-muted"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="portfolio-info card shadow-lg h-100">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title mb-0"><i class="bi bi-info-circle-fill me-2"></i>Informasi Destinasi
                                </h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-tag-fill me-2 text-primary"></i><strong>Jenis
                                                Wisata</strong></span>
                                        <span class="badge bg-info text-dark rounded-pill">{{ $wisata->jenis->nama }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i
                                                class="bi bi-geo-alt-fill me-2 text-success"></i><strong>Kecamatan</strong></span>
                                        <span>{{ $wisata->kecamatan->nama }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="mb-1"><i
                                                class="bi bi-pin-map-fill me-2 text-danger"></i><strong>Alamat</strong></p>
                                        <p class="mb-0 text-muted small">{{ $wisata->alamat }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="mb-1"><i class="bi bi-clock-fill me-2 text-info"></i><strong>Jam
                                                Operasional</strong></p>
                                        <p class="mb-0 text-muted">
                                            {{ $wisata->jam_operasional ?? 'Informasi tidak tersedia' }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="mb-1"><i class="bi bi-cash-coin me-2 text-warning"></i><strong>Harga
                                                Tiket</strong></p>
                                        <p class="mb-0 text-muted fw-bold">
                                            {{ 'Rp ' . number_format($wisata->harga_tiket, 0, ',', '.') }}</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-star-half me-2 text-warning"></i><strong>Rating
                                                Pengunjung</strong></span>
                                        <span class="fw-bold h5 text-warning mb-0">{{ number_format($wisata->rating, 1) }}
                                            / 5.0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-7">
                        <div class="card shadow-lg">
                            <div class="card-body p-4">
                                <h4 class="card-title">Tentang {{ $wisata->nama }}</h4>
                                <p class="card-text" style="text-align: justify;">
                                    {!! nl2br(e($wisata->deskripsi)) !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card shadow-lg h-100">
                            <div class="card-body p-4">
                                <h4 class="card-title">Lokasi di Peta</h4>
                                <div id="map" style="height: 300px; width: 100%; border-radius: 8px; z-index: 1;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('pariwisata.index') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-arrow-left-circle me-2"></i>
                        Kembali ke Daftar Wisata
                    </a>
                </div>

            </div>
        </section>
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lat = {{ $wisata->latitude }};
            var lng = {{ $wisata->longitude }};
            var nama = "{{ $wisata->nama }}";

            var map = L.map('map').setView([lat, lng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup(`<b>${nama}</b>`)
                .openPopup();
        });
    </script>
@endpush
