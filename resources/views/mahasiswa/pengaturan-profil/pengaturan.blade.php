@extends('layout.temp_mhs')
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <form class="w-50">
        <div class="form-group mb-4">
            <label class="label">First Name</label>
            <div class="form-group">
                <input type="text" class="form-control text-dark h-58" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-group mb-4">
            <label class="label">Email</label>
            <div class="form-group">
                <input type="email" class="form-control text-dark h-58" placeholder="envytheme@info.com">
            </div>
        </div>
        <div class="form-group mb-4">
            <label class="label">Password</label>
            <div class="form-group">
                <div class="password-wrapper position-relative">
                    <input type="password" id="password" class="form-control text-dark" value="password">
                    <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                       class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                       aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="form-group mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary bg-primary bg-opacity-10 text-primary border-0 fw-semibold py-2 px-4">Submit</button>
            <button type="submit" class="btn btn-danger bg-danger bg-opacity-10 text-danger border-0 fw-semibold py-2 px-4">Cancel</button>
        </div>
    </form>
</div>

@endsection
