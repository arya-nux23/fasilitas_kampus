@extends('layout.template')
@section('content')
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Form Tambah Siswa</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="index.html" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Form Tambah Siswa</span>
        </li>
    </ul>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <form action="/edit/{{ $admin->id_admin }}/operator" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="label">Nama Operator</label>
                                <div class="position-relative">
                                    <input type="text" name="name" class="form-control text-dark ps-5" placeholder="Masukkan Nama" value="{{ old('name', $admin->nama_admin ?? '') }}">
                                    <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="label">email</label>
                                <div class="position-relative">
                                    <input type="text" name="email" class="form-control text-dark ps-5" placeholder="Masukkan email" value="{{ old('email', $admin->email ?? '') }}">
                                    <i class="ri-hashtag position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4 justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="label">Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control ps-5" placeholder="masukkan password"
                                    <i class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                    <div class="form-text text-primary">Kosongkan password jika tidak ingin mengubahnya.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary bg-primary bg-opacity-10 text-primary border-0 fw-semibold py-2 px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
