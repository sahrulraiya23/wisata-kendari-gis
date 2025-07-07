@extends('layouts.app')

@section('title', $wisata->nama)

@section('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <style>
        .detail-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 20px;
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }

        .tourism-image {
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .tourism-image:hover {
            transform: scale(1.02);
        }

        .info-item {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        .info-title {
            color: #495057;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-content {
            color: #6c757d;
            margin: 0;
            line-height: 1.6;
        }

        .rating-display {
            display: inline-flex;
            align-items: center;
            background: #fff3cd;
            padding: 8px 15px;
            border-radius: 25px;
            border: 2px solid #ffc107;
        }

        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .back-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }

        .badge-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
    </style>
@endsection

@section('content')
    {{-- Hero Section --}}
    <div class="hero-section">
        <div class="container" style="margin-top: 100px;">
            <div class="text-center">
                <h1 class="display-5 fw-bold mb-2">
                    <i class="fas fa-map-marker-alt me-3"></i>{{ $wisata->nama }}
                </h1>
                <p class="lead opacity-90">Jelajahi keindahan destinasi wisata terbaik</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            {{-- Bagian Info Detail --}}
            <div class="col-lg-6 mb-4">
                <div class="detail-card">
                    @if ($wisata->gambar)
                        <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}"
                            class="img-fluid tourism-image mb-4 w-100" style="max-height: 300px; object-fit: cover;">
                    @endif

                    <div class="info-item">
                        <div class="info-title">
                            <i class="fas fa-tag text-primary"></i>
                            <strong>Jenis Wisata</strong>
                        </div>
                        <p class="info-content">
                            <span class="badge-custom">{{ $wisata->jenis->nama }}</span>
                        </p>
                    </div>

                    <div class="info-item">
                        <div class="info-title">
                            <i class="fas fa-building text-success"></i>
                            <strong>Kecamatan</strong>
                        </div>
                        <p class="info-content">{{ $wisata->kecamatan->nama }}</p>
                    </div>

                    <div class="info-item">
                        <div class="info-title">
                            <i class="fas fa-map-marker-alt text-danger"></i>
                            <strong>Alamat</strong>
                        </div>
                        <p class="info-content">{{ $wisata->alamat }}</p>
                    </div>

                    <div class="info-item">
                        <div class="info-title">
                            <i class="fas fa-info-circle text-info"></i>
                            <strong>Deskripsi</strong>
                        </div>
                        <p class="info-content">{{ $wisata->deskripsi }}</p>
                    </div>

                    <div class="info-item">
                        <div class="info-title">
                            <i class="fas fa-star text-warning"></i>
                            <strong>Rating</strong>
                        </div>
                        <div class="rating-display">
                            <i class="fas fa-star text-warning me-2"></i>
                            <span class="fw-bold">{{ number_format($wisata->rating, 1) }}</span>
                            <span class="ms-1 text-muted">/ 5.0</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Peta --}}
            <div class="col-lg-6 mb-4">
                <div class="detail-card">
                    <div class="info-title mb-3">
                        <i class="fas fa-map text-primary"></i>
                        <strong>Peta Lokasi</strong>
                    </div>
                    <div class="map-container">
                        <div id="map" style="height: 400px; width: 100%;"></div>
                    </div>
                    <div class="mt-3 text-center">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Klik marker untuk melihat detail lokasi
                        </small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="text-center mt-4 mb-5">
            <a href="{{ route('pariwisata.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Wisata
            </a>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create map after DOM is fully loaded
            var map = L.map('map').setView([{{ $wisata->latitude }}, {{ $wisata->longitude }}], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            // Custom marker icon
            var customIcon = L.divIcon({
                html: '<i class="fas fa-map-marker-alt" style="color: #dc3545; font-size: 24px;"></i>',
                iconSize: [20, 20],
                className: 'custom-div-icon'
            });

            L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}], {
                    icon: customIcon
                }).addTo(map)
                .bindPopup(`
                    <div style="text-align: center; padding: 10px;">
                        <h6 style="margin: 0 0 5px 0; color: #495057;"><b>{{ $wisata->nama }}</b></h6>
                        <p style="margin: 0; color: #6c757d; font-size: 0.9rem;">{{ $wisata->alamat }}</p>
                        <div style="margin-top: 8px;">
                            <span style="background: #667eea; color: white; padding: 3px 8px; border-radius: 10px; font-size: 0.8rem;">
                                {{ $wisata->jenis->nama }}
                            </span>
                        </div>
                    </div>
                `)
                .openPopup();
        });
    </script>
@endpush
