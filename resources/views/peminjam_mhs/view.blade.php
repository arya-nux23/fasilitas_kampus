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
                                <th scope="col">Tangal</th>
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
                                    <td>{{ $item->date }}</td>
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
                                <div class="modal fade" id="modalEdit{{ $item->id_peminjam }}" tabindex="-1"
                                    aria-labelledby="modalEdit" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="modalEdit">edit Peminjaman</h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="/edit/peminjam/{{ $item->id_peminjam }}/mahasiswa">
                                                    @csrf
                                                    <!-- Dropdown untuk nama alat -->
                                                    <div class="mb-3">
                                                        <label for="fasilitas_id" class="form-label">Nama Fasilitas</label>
                                                        <select class="form-select" id="fasilitas_id" name="fasilitas"
                                                            required>
                                                            <option value="" disabled selected>Pilih Fasilitas
                                                            </option>
                                                            @foreach ($fasilitas as $a)
                                                                <option value="{{ $a->id_fasilitas }}"
                                                                    {{ $item->fasilitas_id == $a->id_fasilitas ? 'selected' : '' }}>
                                                                    {{ $a->nama_fasilitas }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tanggal" class="form-label">Tanggal</label>
                                                        <input type="date" name="date" value="{{ $item->date }}"
                                                            class="form-control" id="tanggal">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

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
                                {{-- modal awal detail data peminjam --}}
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
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3 text-center">
                                                                    <label class="form-label d-block">Gambar
                                                                        Fasilitas</label>
                                                                    <img src="{{ asset('storage/' . $item->fasilitas->foto) }}"
                                                                        alt="Foto Fasilitas"
                                                                        class="img-fluid rounded shadow"
                                                                        style="max-height: 300px; object-fit: cover;">
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
                                                                    <label class="form-label">Nama Fasilitas</label>
                                                                    <div class="input-group">
                                                                        <span class="d-block input-group-text"><i
                                                                                class="bi bi-collection-fill"></i></span>
                                                                        <input class="form-control" id="nama_fasilitas"
                                                                            value="{{ $item->fasilitas->nama_fasilitas }}"
                                                                            disabled>

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
                                                                            $status = 'sedang di pakai';
                                                                        } elseif (
                                                                            $item->status_pengajuan === 'pending' &&
                                                                            !$item->returned_at
                                                                        ) {
                                                                            $status =
                                                                                'Sudah diajukan dan menunggu konfirmasi';
                                                                        } else {
                                                                            $status =
                                                                                'silahkan ajukan permintaan pinjaman';
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
                                {{-- modal akhir detail data peminjam --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Peminjaman -->
    <div class="modal fade" id="modalTambahPeminjaman" tabindex="-1" aria-labelledby="modalTambahLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Peminjaman</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/peminjam/tambah">
                        @csrf
                        <!-- Dropdown untuk nama alat -->
                        <div class="mb-3">
                            <label for="fasilitas_id" class="form-label">Nama Fasilitas</label>
                            <select class="form-select" id="fasilitas_id" name="fasilitas" required>
                                <option value="" disabled selected>Pilih Fasilitas</option>
                                @foreach ($fasilitas as $item)
                                    <option value="{{ $item->id_fasilitas }}">{{ $item->nama_fasilitas }} - Stok
                                        {{ $item->stok }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Stok yang Dibutuhkan</label>
                            <input type="number" name="jumlah" class="form-control" id="jumlah"
                                placeholder="Masukkan jumlah" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="date" class="form-control" id="tanggal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
