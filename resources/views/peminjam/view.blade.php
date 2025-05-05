@extends('layout.template')
@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    title: "SUCCESS!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script>
    <div class="card bg-white border-0 rounded-10 mb-4">
        <div class="card-body p-4">
            <div class="default-table-area members-list">
                <div class="alert alert-warning mb-4" role="alert">
                    <h4 class="fw-semibold fs-18 mb-sm-0">Peminjam Hari ini</h4>

                    <i class="bi bi-exclamation-circle"></i>
                    Data di bawah hanya akan tampil data peminjaman pada hari ini saja. Jika ingin
                    melihat riwayat data peminjaman yang sudah anda pinjam bisa pergi ke menu
                    riwayat peminjaman pada daftar menu.
                    <div class="fw-bold pt-3">
                        Diharapkan setiap peminjaman yang sudah melakukan pengajuan kembalian mohon lakukan konfirmasi
                        pengembaliannya.
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table align-middle" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-primary text-center">#</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Nama Alat</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjam as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td><span class="badge text-bg-primary">{{ $item->mahasiswa->nama_mhs }}</span></td>
                                    <td>{{ $item->alat->nama_alat }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        @if ($item->returned_at)
                                            <span class="badge text-bg-secondary">
                                                <i class="ri-checkbox-circle-line"></i>
                                            </span>
                                        @else
                                            <span class="badge text-bg-warning">
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
                                            @if ($item->status_pengajuan === 'pending' && !$item->returned_at)
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    title="Konfirmasi pengembalian" data-bs-toggle="modal"
                                                    data-bs-target="#konfirmasiModal{{ $item->id_peminjam }}">
                                                    <i class="ri-checkbox-multiple-fill"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $item->id_peminjam }}" title="Hapus">
                                                <i class="ri-delete-bin-fill"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- modal hapus --}}
                                <div class="modal fade" id="exampleModal{{ $item->id_peminjam }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">!Peringatan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda Ingin Menghapus Alat <strong>{{ $item->nama_alat }}</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="/hapus/{{ $item->id_peminjam }}/pinjam " class="btn btn-primary">
                                                    Ya!Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal end hapus --}}
                                {{-- start modal konfirmasi --}}
                                <div class="modal fade" id="konfirmasiModal{{ $item->id_peminjam }}" tabindex="-1"
                                    aria-labelledby="konfirmasiModalLabel{{ $item->id_peminjam }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="konfirmasiModalLabel{{ $item->id_peminjam }}">
                                                    Konfirmasi Pengembalian</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin konfirmasi pengembalian ini?
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST"
                                                    action="/peminjaman/{{ $item->id_peminjam }}/konfirmasi">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Ya, Konfirmasi</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end konfrimasi --}}
                                {{-- start ditail peminjam --}}
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
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="alert alert-primary">
                                                            Data di bawah adalah detail data mahasiswa.
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nomor Identitas
                                                                        Mahasiswa</label>
                                                                    <input class="form-control"
                                                                        id="student_identification_number"
                                                                        value="{{ $item->mahasiswa->nim_mhs }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama Mahasiswa</label>
                                                                    <input class="form-control" id="student_name"
                                                                        value="{{ $item->mahasiswa->nama_mhs }}" disabled>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Program Studi</label>
                                                                    <div class="input-group">
                                                                        <span class="d-block input-group-text"><i
                                                                                class="bi bi-bookmarks-fill"></i></span>
                                                                        <input class="form-control"
                                                                            id="student_phone_number"
                                                                            value="{{ $item->mahasiswa->jurusan->nama_jurusan ?? '-' }}"
                                                                            disabled>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="alert alert-primary">
                                                            Data di bawah adalah detail data peminjaman.
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama Alat</label>
                                                                    <div class="input-group">
                                                                        <span class="d-block input-group-text"><i
                                                                                class="bi bi-collection-fill"></i></span>
                                                                        <input class="form-control" id="nama_alat"
                                                                            value="{{ $item->alat->nama_alat }}" disabled>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tanggal</label>
                                                                    <div class="input-group">
                                                                        <span class="d-block input-group-text"><i
                                                                                class="bi bi-calendar-fill"></i></span>
                                                                        <input class="form-control" id="date"
                                                                            value="{{ $item->date }}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Status</label>
                                                                    @php
                                                                        if (
                                                                            $item->status_pengajuan === 'selesai' &&
                                                                            $item->returned_at
                                                                        ) {
                                                                            $status = 'Sudah dikonfirmasi pengembalian';
                                                                        } elseif (
                                                                            $item->status_pengajuan === 'pending' &&
                                                                            !$item->returned_at
                                                                        ) {
                                                                            $status =
                                                                                'Sudah dikembalikan dan menunggu konfirmasi';
                                                                        } else {
                                                                            $status = 'Sedang dipakai';
                                                                        }
                                                                    @endphp
                                                                    <input class="form-control" id="is_returned"
                                                                        value="{{ $status }}" disabled>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Catatan</label>
                                                                    <textarea class="form-control" id="note" disabled style="height: 100px">{{ $item->note }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary close-button"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- akhir ditail peminjam --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
