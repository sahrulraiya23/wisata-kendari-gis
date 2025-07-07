@extends('layouts.app')

@section('title', 'Peta Wisata Kota Kendari')

@push('styles')
    {{-- (CSS Anda dari sebelumnya tidak perlu diubah) --}}
    <style>
        #map {
            height: 600px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .leaflet-popup-content {
            margin: 0;
            padding: 0;
        }

        .popup-card {
            width: 250px;
        }

        .popup-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px 5px 0 0;
        }

        .popup-content {
            padding: 10px;
        }

        .filter-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .legend {
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
        }

        .kecamatan-color {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
            border-radius: 3px;
        }

        .legend-marker {
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
            text-align: center;
        }

        .legend-marker img {
            vertical-align: middle;
        }

        .jenis-wisata-legend div,
        .kecamatan-legend div {
            clear: both;
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .jenis-wisata-legend h6,
        .kecamatan-legend h6 {
            margin-top: 0;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        {{-- (HTML Anda dari sebelumnya tidak perlu diubah) --}}
        <div class="container d-flex justify-content-center" style="padding-top: 100px;">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="mb-2 text-primary">Peta Wisata Kota Kendari</h1>
                    <p class="text-muted">Jelajahi berbagai destinasi wisata menarik di Kota Kendari, Sulawesi Tenggara</p>
                </div>
            </div>
        </div>
        <div class="filter-section">
            <form method="GET" action="{{ route('pemetaan.index') }}" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="search" class="form-label">Cari Wisata</label>
                    <input type="search" name="search" id="search" class="form-control"
                        placeholder="Contoh: Pantai, Museum..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label for="jenis_id" class="form-label">Jenis Wisata</label>
                    <select name="jenis_id" id="jenis_id" class="form-select">
                        <option value="">-- Semua Jenis Wisata --</option>
                        @foreach ($jenis_wisata as $jenis)
                            <option value="{{ $jenis->id }}" {{ request('jenis_id') == $jenis->id ? 'selected' : '' }}>
                                {{ $jenis->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="kecamatan_id" class="form-label">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan_id" class="form-select">
                        <option value="">-- Semua Kecamatan --</option>
                        @foreach ($daftar_kecamatan as $kec)
                            <option value="{{ $kec->id }}" {{ request('kecamatan_id') == $kec->id ? 'selected' : '' }}>
                                {{ $kec->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Terapkan</button>
                </div>

                @if (request('search') || request('jenis_id') || request('kecamatan_id'))
                    <div class="col-12 mt-2">
                        <a href="{{ route('pemetaan.index') }}" class="btn btn-sm btn-outline-secondary">Reset Filter</a>
                    </div>
                @endif
            </form>
        </div>
        <div class="card mb-4">
            <div class="card-body p-0">
                <div id="map"></div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h3>Tempat Wisata Ditemukan</h3>
                <div class="row">
                    @forelse($daftar_wisata as $wisata)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if ($wisata->gambar)
                                    <img src="{{ asset('storage/' . $wisata->gambar) }}" class="card-img-top"
                                        alt="{{ $wisata->nama }}" style="height: 180px; object-fit: cover;">
                                @else
                                    <div class="bg-light text-center d-flex justify-content-center align-items-center"
                                        style="height: 180px;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $wisata->nama }}</h5>
                                    <p class="card-text mb-1"><small class="text-muted">{{ $wisata->jenis->nama }} •
                                            {{ $wisata->kecamatan->nama }}</small></p>
                                    @if ($wisata->rating)
                                        <div class="mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= round($wisata->rating))
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-warning"></i>
                                                @endif
                                            @endfor
                                            <span class="ms-1">{{ $wisata->rating }}/5</span>
                                        </div>
                                    @endif
                                    <p class="card-text">{{ Str::limit($wisata->deskripsi, 100) }}</p>
                                    <a href="{{ route('pariwisata.show', $wisata->id) }}"
                                        class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                Tidak ada tempat wisata yang ditemukan dengan filter yang dipilih. Silakan coba lagi atau
                                reset filter.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([-3.9674, 122.5947], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);


            const wisataData = @json($daftar_wisata);

            // --- Pemetaan Ikon ---
            const iconMapping = {
                '1': {
                    url: '{{ asset('assets/img/icon/gis1.png') }}'
                },
                '2': {
                    url: '{{ asset('assets/img/icon/gis2.png') }}'
                },
                '3': {
                    url: '{{ asset('assets/img/icon/gis3.png') }}'
                },
                '4': {
                    url: '{{ asset('assets/img/icon/gis5.png') }}'
                },
                '5': {
                    url: '{{ asset('assets/img/icon/gis6.png') }}'
                },
                '6': {
                    url: '{{ asset('assets/img/icon/gis7.png') }}'
                },
                '7': {
                    url: '{{ asset('assets/img/icon/gis10.png') }}'
                },
                '8': {
                    url: '{{ asset('assets/img/icon/gis8.png') }}'
                },
                '9': {
                    url: '{{ asset('assets/img/icon/gis9.png') }}'
                },
                '10': {
                    url: '{{ asset('assets/img/icon/gis11.png') }}'
                },
            };
            const leafletIcons = {};
            for (const id in iconMapping) {
                leafletIcons[id] = L.icon({
                    iconUrl: iconMapping[id].url,
                    iconSize: [32, 32],
                    iconAnchor: [16, 32],
                    popupAnchor: [0, -32]
                });
            }
            const defaultIcon = L.icon({
                iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34]
            });

            // --- Legenda ---
            const kecamatanColors = {
                'kambu': '#E74C3C',
                'abeli': '#3498DB',
                'mandonga': '#2ECC71',
                'baruga': '#9B59B6',
                'poasia': '#F1C40F',
                'kendari': '#1ABC9C',
                'kendari_barat': '#34495E',
                'kadia': '#E91E63',
                'wua_wua': '#F39C12',
                'puuwatu': '#00B894',
                'nambo': '#D35400'
            };

            // PERBAIKAN: Ambil referensi ke elemen legenda SETELAH ditambahkan ke peta
            const jenisWisataLegend = L.control({
                position: 'bottomright'
            });
            jenisWisataLegend.onAdd = function(map) {
                const div = L.DomUtil.create('div', 'legend');
                div.innerHTML = '<h6>Jenis Wisata</h6>';
                return div;
            };
            jenisWisataLegend.addTo(map);
            const jenisLegendDiv = jenisWisataLegend.getContainer(); // Simpan elemen ke variabel

            const kecamatanLegend = L.control({
                position: 'bottomleft'
            });
            kecamatanLegend.onAdd = function(map) {
                const div = L.DomUtil.create('div', 'legend');
                div.innerHTML = '<h6>Kecamatan</h6>';
                return div;
            };
            kecamatanLegend.addTo(map);
            const kecamatanLegendDiv = kecamatanLegend.getContainer(); // Simpan elemen ke variabel

            const markers = [];
            const legendItems = new Set();

            // --- Proses Marker dan GeoJSON ---
            wisataData.forEach(w => {
                if (w.latitude && w.longitude) {
                    const icon = leafletIcons[w.jenis.id] || defaultIcon;
                    const marker = L.marker([w.latitude, w.longitude], {
                        icon: icon
                    }).addTo(map);

                    if (!legendItems.has(w.jenis.id)) {
                        // PERBAIKAN: Gunakan variabel yang sudah disimpan, bukan querySelector
                        jenisLegendDiv.innerHTML += `
                            <div class="d-flex align-items-center mb-1">
                                <span class="legend-marker">
                                    <img src="${icon.options.iconUrl}" width="24" height="24" alt="${w.jenis.nama}">
                                </span>
                                <span>${w.jenis.nama}</span>
                            </div>`;
                        legendItems.add(w.jenis.id);
                    }

                    // (Sisa kode popup tidak berubah)
                    const popupHtml =
                        `<div class="popup-card">${w.gambar ? `<img src="/storage/${w.gambar}" alt="${w.nama}" onerror="this.onerror=null;this.src='/images/no-image.jpg';">` : ''}<div class="popup-content"><h6 class="mb-2">${w.nama}</h6><div class="mb-2"><small><strong>Jenis:</strong> ${w.jenis.nama}</small><br><small><strong>Kecamatan:</strong> ${w.kecamatan.nama}</small><br><small><strong>Alamat:</strong> ${w.alamat}</small><br><small><strong>Rating:</strong> ${w.rating ? w.rating + '/5' : '-'}</small></div><a href="{{ url('/pariwisata') }}/${w.id}" class="btn btn-sm btn-primary w-100 mt-2">Lihat Detail</a></div></div>`;
                    marker.bindPopup(popupHtml, {
                        closeButton: true,
                        maxWidth: 250,
                        minWidth: 250
                    });
                    markers.push(marker);
                }
            });

            // (Logika GeoJSON tidak saya ubah, hanya perbaikan pada legenda)
            const kecamatanLayerGroup = L.layerGroup().addTo(map);
            const kecamatanItems = new Set();

            function addKecamatanGeoJSON(kecamatanName, kecamatanDisplayName, geojsonUrl) {
                fetch(geojsonUrl).then(response => response.json()).then(data => {
                    const color = kecamatanColors[kecamatanName.toLowerCase()] || '#888888';
                    const kecamatanLayer = L.geoJSON(data, {
                        style: {
                            fillColor: color,
                            weight: 2,
                            opacity: 1,
                            color: 'white',
                            dashArray: '3',
                            fillOpacity: 0.4
                        }
                    });
                    kecamatanLayer.bindPopup(`<strong>Kecamatan ${kecamatanDisplayName}</strong>`);
                    kecamatanLayerGroup.addLayer(kecamatanLayer);
                    if (!kecamatanItems.has(kecamatanName)) {
                        // PERBAIKAN: Gunakan variabel yang sudah disimpan
                        kecamatanLegendDiv.innerHTML +=
                            `<div class="d-flex align-items-center mb-1"><i class="kecamatan-color" style="background:${color}"></i><span>${kecamatanDisplayName}</span></div>`;
                        kecamatanItems.add(kecamatanName);
                    }
                    kecamatanLayer.bringToBack();
                }).catch(error => console.error(`Error loading ${kecamatanName} GeoJSON:`, error));
            }
            addKecamatanGeoJSON('kambu', 'Kambu', '/geojson/kecamatan_kambu.geojson');
            addKecamatanGeoJSON('abeli', 'Abeli', '/geojson/kecamatan_abeli.geojson');
            addKecamatanGeoJSON('baruga', 'Baruga', '/geojson/kecamatan_baruga.geojson');
            addKecamatanGeoJSON('kadia', 'Kadia', '/geojson/kecamatan_kadia.geojson');
            addKecamatanGeoJSON('kendari_barat', 'Kendari Barat', '/geojson/kecamatan_kendari_barat.geojson');
            addKecamatanGeoJSON('kendari', 'Kendari', '/geojson/kecamatan_kendari.geojson');
            addKecamatanGeoJSON('mandonga', 'Mandonga', '/geojson/kecamatan_mandonga.geojson');
            addKecamatanGeoJSON('nambo', 'Nambo', '/geojson/kecamatan_nambo.geojson');
            addKecamatanGeoJSON('poasia', 'Poasia', '/geojson/kecamatan_poasia.geojson');
            addKecamatanGeoJSON('puuwatu', 'Puuwatu', '/geojson/kecamatan_puuwatu.geojson');
            addKecamatanGeoJSON('wua_wua', 'Wua-wua', '/geojson/kecamatan_wua_wua.geojson');

            // --- Penyesuaian akhir peta ---
            if (markers.length > 0) {
                const group = new L.featureGroup(markers);
                map.fitBounds(group.getBounds().pad(0.1));
            }
            L.control.scale({
                imperial: false,
                metric: true
            }).addTo(map);
            L.control.locate({
                position: 'topright',
                strings: {
                    title: "Lokasi Saya"
                }
            }).addTo(map);
            L.control.layers(null, {
                "Batas Kecamatan": kecamatanLayerGroup
            }).addTo(map);
        });
    </script>
@endpush
