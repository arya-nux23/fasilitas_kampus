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
                <a href="/tambah_operator" class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
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
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ms-2" for="flexCheckDefault">No</label>
                                    </div>
                                </th>
                                <th scope="col">Nama admin</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_admin }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="dropdown action-opt">
                                        <button class="btn bg p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i data-feather="more-horizontal"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                            <li>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i data-feather="info" class="menu-icon tf-icons"></i>
                                                    Detail
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/edit/{{ $item->id_admin }}/operator">
                                                    <i data-feather="edit" class="menu-icon tf-icons"></i>
                                                    edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $item->id_admin }}">
                                                    <i data-feather="trash-2"></i>
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $item->id_admin }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">!Peringatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda Ingin Menghapus admin <strong>{{ $item->nama_admin }}</strong>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="/hapus/{{ $item->id_admin }}/operator"
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
