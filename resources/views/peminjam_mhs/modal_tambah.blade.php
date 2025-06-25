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
                    <form method="POST" action="{{route('peminjam.store')}}">
                        @csrf

                        <!-- Nama Fasilitas -->
                        <div class="mb-3">
                            <label for="fasilitas_id" class="form-label">Nama Fasilitas</label>
                            <select class="form-select" id="fasilitas_id" name="fasilitas_id" required>
                                <option value="" disabled selected>Pilih Fasilitas</option>
                                @foreach ($fasilitas as $item)
                                    <option value="{{ $item->id_fasilitas }}">{{ $item->nama_fasilitas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tanggal Peminjaman -->
                        <div class="mb-3">
                            <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman"
                                required>
                        </div>

                        <!-- Tanggal Tenggat -->
                        <div class="mb-3">
                            <label for="tanggal_tenggat" class="form-label">Tanggal Tenggat</label>
                            <input type="date" name="tanggal_tenggat" class="form-control" id="tanggal_tenggat"
                                required>
                        </div>

                        <!-- Note -->
                        <div class="mb-3">
                            <label for="note" class="form-label">Catatan</label>
                            <textarea name="note" id="note" class="form-control" rows="3"
                                placeholder="Tulis catatan jika ada..."></textarea>
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
