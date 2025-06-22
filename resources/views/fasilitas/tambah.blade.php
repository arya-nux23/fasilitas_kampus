@extends('layout.template')
@section('content')
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <h4 class="fs-18 mb-4">Tambah Fasilitas</h4>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab"
                        tabindex="0">
                        <form action="/tambah/fasilitas" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Nama Fasilitas</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="nama" class="form-control text-dark ps-5 h-58"
                                                placeholder="Enter Name">
                                            <i
                                                class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Lokasi</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="tempat" class="form-control text-dark ps-5 h-58"
                                                placeholder="Masuk Lokasi">
                                            <i
                                                class="ri-map-pin-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label class="label">Foto</label>
                                        <div class="form-control w-100 h-100 text-center position-relative p-4 p-lg-5">
                                            <div class="product-upload d-flex justify-content-center">
                                                <label for="foto-upload" class="file-upload mb-0">
                                                    <span class="d-inline-block wh-110 bg-body-bg rounded-10 position-relative">
                                                        <i class="ri-camera-line wh-38 bg-gray-div7 d-inline-block text-gray-light rounded-circle position-absolute bottom-0 end-0" style="right: -10px !important; bottom: -10px !important;"></i>
                                                    </span>
                                                </label>
                                                <input id="foto-upload" name="foto" type="file" class="d-none">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-0">
                                        <label class="label">Descripsi:</label>
                                        <div class="form-group position-relative">
                                            <textarea name="desk" class="form-control ps-5 text-dark" placeholder="Some demo text ... " cols="30"
                                                rows="5"></textarea>
                                            <i
                                                class="ri-information-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20 pt-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tombol Simpan -->
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="ri-save-line me-1"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
