@extends('layouts.app')

@section('title', 'Daftar Wisata')

@section('content')
    <div class="container">
        <div class="container d-flex justify-content-center" style="padding-top: 100px;">
            <!-- Header Section -->
            <div class="row text-center">

                <h2 class="fw-bold text-primary">
                    <i class="fas fa-map-marked-alt me-2"></i>Daftar Wisata
                </h2>
                <p class="text-muted">Jelajahi destinasi wisata menarik di daerah kami</p>

            </div>
        </div>

        <!-- Table Section -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="fw-bold" width="5%">#</th>
                                <th class="fw-bold" width="12%">Foto</th>
                                <th class="fw-bold" width="15%">Nama Wisata</th>
                                <th class="fw-bold" width="10%">Jenis Wisata</th>
                                <th class="fw-bold" width="10%">Kecamatan</th>
                                <th class="fw-bold" width="15%">Alamat</th>
                                <th class="fw-bold" width="15%">Deskripsi</th>
                                <th class="fw-bold" width="8%">Rating</th>
                                <th class="fw-bold" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daftar_wisata as $index => $wisata)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">
                                        @if ($wisata->gambar)
                                            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}"
                                                class="img-thumbnail"
                                                style="width: 100px; height: 70px; object-fit: cover;">
                                        @else
                                            <div class="bg-light text-center py-3 rounded">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle fw-bold">{{ $wisata->nama }}</td>
                                    <td class="align-middle">
                                        <span class="badge bg-primary">{{ $wisata->jenis->nama }}</span>
                                    </td>
                                    <td class="align-middle">{{ $wisata->kecamatan->nama }}</td>
                                    <td class="align-middle small">{{ Str::limit($wisata->alamat, 50, '...') }}</td>
                                    <td class="align-middle small">{{ Str::limit($wisata->deskripsi, 100, '...') }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-star text-warning me-1"></i>
                                            <span>{{ number_format($wisata->rating, 1) }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('pariwisata.show', $wisata->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-info-circle me-1"></i>Detail
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Data wisata tidak tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination if needed -->
        @if (isset($daftar_wisata) && method_exists($daftar_wisata, 'hasPages') && $daftar_wisata->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $daftar_wisata->links() }}
            </div>
        @endif
    </div>

    @push('styles')
        <style>
            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: middle;
            }

            .img-thumbnail {
                border-radius: 6px;
            }
        </style>
    @endpush
@endsection
