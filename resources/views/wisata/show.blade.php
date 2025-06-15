@extends('layouts.app')

@section('title', $wisata->nama)

@section('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endsection

@section('content')
    <div class="container">
        <div class="container d-flex justify-content-center" style="padding-top: 100px;">
            <h2 class="mb-4"><i class="fas fa-map-marker-alt me-2"></i>Detail Wisata: {{ $wisata->nama }}</h2>
        </div>
        <div class="row">
            {{-- Bagian Info Detail --}}
            <div class="col-md-6">
                @if ($wisata->gambar)
                    <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}"
                        class="img-fluid rounded mb-3" style="max-height: 300px; object-fit: cover;">
                @endif

                <h4>Jenis Wisata</h4>
                <p><span class="badge bg-primary">{{ $wisata->jenis->nama }}</span></p>

                <h4>Kecamatan</h4>
                <p>{{ $wisata->kecamatan->nama }}</p>

                <h4>Alamat</h4>
                <p>{{ $wisata->alamat }}</p>

                <h4>Deskripsi</h4>
                <p>{{ $wisata->deskripsi }}</p>

                <h4>Rating</h4>
                <p>
                    <i class="fas fa-star text-warning"></i> {{ number_format($wisata->rating, 1) }}
                </p>
            </div>

            {{-- Bagian Peta --}}
            <div class="col-md-6">
                <h4>Peta Lokasi</h4>
                <div id="map" style="height: 400px; width: 100%; border: 1px solid #ccc;"></div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('pariwisata.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Wisata
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
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}]).addTo(map)
                .bindPopup('<b>{{ $wisata->nama }}</b><br>{{ $wisata->alamat }}')
                .openPopup();
        });
    </script>
@endpush
