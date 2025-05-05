@extends('layout.template')
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
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
                <button class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Create New User</span>
                    </span>
                </button>
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
                                <th scope="col">Nama Jurusan</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurusan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_jurusan}}</td>
                                    <td>
                                        <div class="dropdown action-opt">
                                            <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                <li>
                                                    <a class="dropdown-item" href="" data-bs-toggle="offcanvas"
                                                        data-bs-target="#edit{{ $item->id_jurusan }}"
                                                        aria-controls="offcanvasRight">
                                                        <i data-feather="edit" class="menu-icon tf-icons"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $item->id_jurusan }}">
                                                        <i data-feather="trash-2"></i>
                                                        Hapus
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id_jurusan }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">!Peringatan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda Ingin Menghapus jurusan <strong>{{ $item->nama_jurusan }}</strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="/hapus/{{ $item->id_jurusan }}/jurusan "
                                                                class="btn btn-primary"> Ya!Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="edit{{ $item->id_jurusan }}"
                                            aria-labelledby="offcanvasRightLabel">
                                            <div class="offcanvas-header border-bottom p-4">
                                                <h5 class="offcanvas-title fs-18 mb-0" id="offcanvasRightLabel">Edit siswa
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body p-4">
                                                <form action="/edit/{{ $item->id_jurusan }}/jurusan" method="POST">
                                                    @csrf
                                                    <div class="form-group mb-4">
                                                        <label class="label">Name jurusan</label>
                                                        <input type="text" name="jurusan" class="form-control text-dark"
                                                            placeholder="User Name"  value="{{ old('nama_jurusan', $item->nama_jurusan) }}">
                                                    </div>
                                                    <div class="form-group d-flex gap-3">
                                                        <button
                                                            class="btn btn-primary text-white fw-semibold py-2 px-2 px-sm-3">
                                                            <span class="py-sm-1 d-block">
                                                                <i class="ri-add-line text-white"></i>
                                                                <span>Create Members</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </form>
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
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom p-4">
            <h5 class="offcanvas-title fs-18 mb-0" id="offcanvasRightLabel">Create Members List</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">
            <form method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label class="label">Name jurusan</label>
                    <input type="text" name="jurusan" class="form-control text-dark" placeholder="User Name">
                </div>
                <div class="form-group d-flex gap-3">
                    <button class="btn btn-primary text-white fw-semibold py-2 px-2 px-sm-3">
                        <span class="py-sm-1 d-block">
                            <i class="ri-add-line text-white"></i>
                            <span>Create Members</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
