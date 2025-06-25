@extends('layout.temp_mhs')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <div class="card bg-white border-0 rounded-10 mb-4">
        <div class="card-body p-4">
            <div class="alert alert-warning mb-4" role="alert">
                <h4 class="fw-semibold fs-18 mb-sm-0">Peminjam Hari ini</h4>

                <i class="bi bi-exclamation-circle"></i>
                Data di bawah hanya akan tampil data peminjaman pada hari ini saja. Jika ingin
                melihat riwayat data peminjaman yang sudah anda pinjam bisa pergi ke menu
                riwayat peminjaman pada daftar menu.
                <div class="fw-bold pt-3">
                    Diharapkan setiap peminjaman yang sudah selesai mohon lakukan pengubahan
                    data pada tombol Pengembalian.
                </div>
            </div>
            <div class="default-table-area members-list">
                <div class="table-responsive">
                    <table class="table align-middle" id="myTable">
                        <thead>
                            <div class="d-flex justify-content-end mb-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahPeminjaman">
                                    <i class="bi bi-plus-circle-fill"></i>
                                    Tambah Peminjaman
                                </button>
                            </div>
                            <tr>
                                <th scope="col" class="text-primary">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label ms-2" for="flexCheckDefault">#</label>
                                    </div>
                                </th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjam as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge text-bg-primary">{{ $item->mahasiswa->nama_mhs }}</span></td>
                                    <td>{{ optional($item->barang)->nama_barang ?? '-' }}</td>
                                    <td>{{ $item->tanggal_tenggat }}</td>
                                    <td>{{ optional($item->barang)->stok ?? '-' }}</td>
                                    <td>
                                        @if ($item->returned_at)
                                            <span class="badge text-bg-primary" title="Sudah dikonfirmasi oleh admin">
                                                <i class="ri-checkbox-circle-line"></i>
                                            </span>
                                        @else
                                            <span class="badge text-bg-warning" title="Belum dikonfirmasi oleh admin">
                                                <i class="ri-error-warning-line"></i>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group gap-1">
                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#detailPeminjam{{ $item->id_peminjam }}" title="Lihat">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            @if ($item->status_pengajuan !== 'pending' && !$item->returned_at)
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#KembaliModal{{ $item->id_peminjam }}" title="Ajukan">
                                                    <i class="ri-checkbox-circle-line"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $item->id_peminjam }}" title="Edit">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                @include('peminjam_barang.modal_edit')
                                 {{-- modal pengembalian --}}
                                <div class="modal fade" id="KembaliModal{{ $item->id_peminjam }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Ajukan Peminjaman</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="/peminjam/{{ $item->id_peminjam }}/pengajuan">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert alert-primary">
                                                                Anda akan mengubah status peminjaman ini menjadi 'sudah
                                                                di ajukan'. Kolom 'jam di ajukan'
                                                                akan otomatis
                                                                diisi dengan waktu setelah Anda mengeklik tombol
                                                                'di ajukankan'. Mohon isi kolom catatan
                                                                jika ada hal yang
                                                                ingin disampaikan.
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="note" class="form-label">Catatan:</label>
                                                                <textarea class="form-control" name="note" id="note" placeholder="Masukan catatan (opsional).."
                                                                    rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary close-button"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-returned">Pinjam</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="detailPeminjam{{ $item->id_peminjam }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Detail Peminjaman</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Mahasiswa</label>
                                                            <input class="form-control"
                                                                value="{{ $item->mahasiswa->nama_mhs }}" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Jurusan</label>
                                                            <input class="form-control"
                                                                value="{{ $item->mahasiswa->jurusan->nama_jurusan ?? '-' }}"
                                                                disabled>
                                                        </div>
                                                        <div class="text-center">
                                                            <label class="form-label">Foto Barang</label>
                                                            @if ($item->barang && $item->barang->foto)
                                                                <img src="{{ asset('storage/' . $item->barang->foto) }}"
                                                                    class="img-fluid rounded shadow"
                                                                    style="max-height: 300px; object-fit: cover;">
                                                            @else
                                                                <p class="text-muted">Tidak ada foto</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Barang</label>
                                                            <input class="form-control"
                                                                value="{{ optional($item->barang)->nama_barang ?? '-' }}"
                                                                disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Stok</label>
                                                            <input class="form-control"
                                                                value="{{ optional($item->barang)->stok ?? '-' }}"
                                                                disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal</label>
                                                            <input class="form-control" value="{{ $item->date }}"
                                                                disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <input class="form-control"
                                                                value="{{ $item->status_pengajuan }}" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Catatan</label>
                                                            <textarea class="form-control" disabled>{{ $item->note }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Peminjaman -->
    @include('peminjam_barang.modal_tambah')
@endsection
