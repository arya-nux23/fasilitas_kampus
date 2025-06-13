@extends('layout.template')
@section('content')
    <!-- Modal Pop-Up -->
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

    <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
        <h3 class="mb-sm-0 mb-1 fs-18">Basic Table</h3>
        <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
            <li>
                <a href="index.html" class="text-decoration-none">
                    <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Basic Table</span>
            </li>
        </ul>
    </div>

    <div class="card bg-white border-0 rounded-10 mb-4">
        <div class="card-body p-4">
            <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-sm-0">Users List</h4>
                <a href="/tambah/fasilitas"
                    class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Tambah Fasilitas</span>
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
                                <th scope="col">Nama Fasilitas</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_fasilitas }}</td>
                                    <td>
                                        @if ($item->peminjamanTerakhir && $item->peminjamanTerakhir->status_pengajuan == 'pending')
                                            Menunggu Konfirmasi
                                        @elseif ($item->peminjamanTerakhir && $item->peminjamanTerakhir->status_pengajuan == 'selesai')
                                            Sedang Dipakai
                                        @else
                                            Tersedia
                                        @endif
                                    </td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>
                                        <div class="dropdown action-opt">
                                            <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                <li>
                                                    <a class="dropdown-item" href="/edit/{{ $item->id_fasilitas }}/fasilitas">
                                                        <i data-feather="edit" class="menu-icon tf-icons"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $item->id_fasilitas }}">
                                                        <i data-feather="trash-2"></i>
                                                        Hapus
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id_fasilitas }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">!Peringatan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda Ingin Menghapus fasilitas
                                                            <strong>{{ $item->nama_fasilitas }}</strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="/hapus/{{ $item->id_fasilitas }}/fasilitas "
                                                                class="btn btn-primary"> Ya!Hapus</a>
                                                        </div>
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
@endsection
