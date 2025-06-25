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
                                <th scope="col">Nama Fasilitas</th>
                                <th scope="col">Tanggal Tenggat</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjam as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge text-bg-primary">{{ $item->mahasiswa->nama_mhs }}</span></td>
                                    <td>{{ $item->fasilitas->nama_fasilitas }}</td>
                                    <td>{{ $item->tanggal_tenggat }}</td>
                                    <td>
                                        @if ($item->returned_at)
                                            <span class="badge text-bg-primary" title="Sudah dikonfirmasi oleh admin">
                                                <i class="ri-checkbox-circle-line"></i> {{-- icon centang --}}
                                            </span>
                                        @else
                                            <span class="badge text-bg-warning" title="Belum dikonfirmasi oleh admin">
                                                <i class="ri-error-warning-line"></i> {{-- icon warning --}}
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
                                                <!-- Tombol Ajukan hanya muncul jika sudah diajukan tapi belum dikonfirmasi -->
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
                                <!-- Modal Edit Peminjaman -->
                                @include('peminjam_mhs.modal_edit')

                                {{-- modal pengembalian --}}
                                @include('peminjam_mhs.modal_pengembalian')
                                {{-- modal awal detail data peminjam --}}
                                @include('peminjam_mhs.modal_detail')
                                {{-- modal akhir detail data peminjam --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Peminjaman -->
    @include('peminjam_mhs.modal_tambah')
@endsection
