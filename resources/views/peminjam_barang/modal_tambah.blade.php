<div class="modal fade" id="modalTambahPeminjaman" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Peminjaman</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/peminjam/tambah/barang">
                    @csrf
                    <!-- Dropdown untuk nama barang -->
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Nama Barang</label>
                        <select class="form-select" id="barang_id" name="barang" required>
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id_barang }}">
                                    {{ $item->nama_barang }} (Stok: {{ $item->stok }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_tenggat" class="form-label">Tanggal Tenggat (Opsional)</label>
                        <input type="date" name="tanggal_tenggat" class="form-control" id="tanggal_tenggat">
                    </div>

                    <div class="mb-3">
                        <label for="catatan_sanksi" class="form-label">Catatan</label>
                        <textarea name="catatan_sanksi" class="form-control" id="catatan_sanksi" rows="3" placeholder="Isi jika ada..."></textarea>
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
