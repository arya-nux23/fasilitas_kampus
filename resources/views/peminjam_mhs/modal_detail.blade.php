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
                                                                            value="{{ $item->tanggal_tenggat }}" disabled>
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
