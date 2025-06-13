@extends('layout.template')
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

    <div class="card bg-white border-0 rounded-10 mb-4">
        <div class="card-body p-4">
            <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-sm-0">Users List</h4>
                <a href="#" class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3"
                    data-bs-toggle="modal" data-bs-target="#modalTambahMahasiswa">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Create New User</span>
                    </span>
                </a>
            </div>
            <div class="default-table-area members-list">
                <div class="table-responsive">
                    <table class="table align-middle" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-primary">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label ms-2" for="flexCheckDefault">No</label>
                                    </div>
                                </th>
                                <th scope="col">Nama mahasiswa</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_mhs }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <div class="dropdown action-opt">
                                            <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $item->id_mahasiswa }}">
                                                        <i data-feather="edit" class="menu-icon tf-icons"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $item->id_mahasiswa }}">
                                                        <i data-feather="trash-2"></i>
                                                        Hapus
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Modal hapus -->
                                            <div class="modal fade" id="exampleModal{{ $item->id_mahasiswa }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">!Peringatan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda Ingin Menghapus mahasiswa
                                                            <strong>{{ $item->nama_mhs }}</strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="/hapus/{{ $item->id_mahasiswa }}/mahasiswa"
                                                                class="btn btn-primary"> Ya!Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- modal edit --}}
                                        <div class="modal fade" id="edit{{ $item->id_mahasiswa }}" tabindex="-1"
                                            aria-labelledby="modalTambahLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Mahasiswa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/edit/{{ $item->id_mahasiswa }}/mahasiswa"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row g-3">
                                                                <div class="col-md-4">
                                                                    <label for="nama" class="form-label">Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama" id="nama"
                                                                        value="{{ $item->nama_mhs }}"
                                                                        placeholder="Masukkan Nama">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="nim" class="form-label">NIM</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nim" id="nim"
                                                                        value="{{ $item->nim_mhs }}"
                                                                        placeholder="Masukkan NIM">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="jurusan_id"
                                                                        class="form-label">Jurusan</label>
                                                                    <select class="form-select" id="jurusan_id"
                                                                        name="jurusan_id" required>
                                                                        <option value="" disabled selected>Pilih
                                                                            Jurusan</option>
                                                                        @foreach ($jurusan as $j)
                                                                            <option value="{{ $j->id_jurusan }}"
                                                                                {{ $j->id_jurusan == $item->jurusan_id ? 'selected' : '' }}>
                                                                                {{ $j->nama_jurusan }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row g-3 mt-2">
                                                                <div class="col-md-6">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        id="email" name="email"
                                                                        value="{{ $item->email }}"
                                                                        placeholder="Masukkan Email">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="password"
                                                                        class="form-label">Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password"
                                                                        placeholder="Masukkan Password">
                                                                    <div class="form-text text-primary">Kosongkan password
                                                                        jika tidak ingin mengubahnya.</div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Mahasiswa -->
    <div class="modal fade" id="modalTambahMahasiswa" tabindex="-1" aria-labelledby="modalTambahLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="col-md-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim" id="nim"
                                    placeholder="Masukkan NIM">
                            </div>
                            <div class="col-md-4">
                                <label for="jurusan_id" class="form-label">Jurusan</label>
                                <select class="form-select" id="jurusan_id" name="jurusan_id" required>
                                    <option value="" disabled selected>Pilih Jurusan</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id_jurusan }}">{{ $item->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan Email">
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
