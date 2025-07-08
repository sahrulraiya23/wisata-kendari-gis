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
        <main id="main">


            <section id="wisata-table" class="wisata-table section">
                <div class="container" data-aos="fade-up">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0"><i class="bi bi-list-ul me-2"></i>Data Pariwisata</h5>
                            <div class="col-md-5">
                                <form action="{{ route('pariwisata.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari nama wisata..." value="{{ request('search') }}">
                                        <button class="btn btn-light" type="submit" id="button-addon2"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" width="5%">#</th>
                                            <th scope="col" width="10%">Foto</th>
                                            <th scope="col" width="15%">Nama Wisata</th>
                                            <th scope="col" width="10%">Jenis</th>
                                            <th scope="col" width="10%">Kecamatan</th>
                                            <th scope="col" width="25%">Alamat</th>
                                            <th scope="col" width="10%">Rating</th>
                                            <th scope="col" class="text-center" width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($daftar_wisata as $index => $wisata)
                                            <tr>
                                                {{-- Penomoran yang benar untuk paginasi --}}
                                                <td>{{ $daftar_wisata->firstItem() + $index }}</td>
                                                <td>
                                                    @if ($wisata->gambar)
                                                        <img src="{{ asset('storage/' . $wisata->gambar) }}"
                                                            alt="{{ $wisata->nama }}" class="img-fluid rounded"
                                                            style="width: 100px; height: 70px; object-fit: cover;">
                                                    @else
                                                        <div class="rounded bg-light d-flex align-items-center justify-content-center"
                                                            style="width: 100px; height: 70px;">
                                                            <i class="bi bi-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="fw-bold">{{ $wisata->nama }}</td>
                                                <td><span class="badge bg-info text-dark">{{ $wisata->jenis->nama }}</span>
                                                </td>
                                                <td>{{ $wisata->kecamatan->nama }}</td>
                                                <td class="small">{{ $wisata->alamat }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                                        <span>{{ number_format($wisata->rating, 1) }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('pariwisata.show', $wisata->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bi bi-info-circle me-1"></i>Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-5">
                                                    <h5 class="text-muted">Data Tidak Ditemukan</h5>
                                                    <p>Saat ini belum ada data wisata yang tersedia atau cocok dengan
                                                        pencarian
                                                        Anda.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if ($daftar_wisata->hasPages())
                            <div class="card-footer bg-light">
                                <div class="d-flex justify-content-center">
                                    {{-- Menambahkan query string pencarian ke link paginasi --}}
                                    {{ $daftar_wisata->appends(request()->query())->links() }}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </section>
        </main>
    @endsection
