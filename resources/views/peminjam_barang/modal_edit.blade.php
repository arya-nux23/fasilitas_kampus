<div class="modal fade" id="modalEdit{{ $item->id_peminjam }}" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalEdit">Edit Peminjaman</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/edit/peminjam/{{ $item->id_peminjam }}/mahasiswa">
                    @csrf
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Nama Barang</label>
                        <select class="form-select" id="barang_id" name="barang" required>
                            <option value="" disabled>Pilih Barang</option>
                            @foreach ($barang as $b)
                                <option value="{{ $b->id_barang }}"
                                    {{ $item->barang_id == $b->id_barang ? 'selected' : '' }}>
                                    {{ $b->nama_barang }} (Stok: {{ $b->stok }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="1"
                            value="{{ old('jumlah', 1) }}" required>
                        {{-- ⚠️ Jumlah tidak disimpan di DB, hanya digunakan untuk mengurangi stok --}}
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="date"
                            value="{{ old('date', \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('Y-m-d')) }}"
                            class="form-control" id="tanggal">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_tenggat" class="form-label">Tanggal Tenggat</label>
                        <input type="datetime-local" name="tanggal_tenggat"
                            value="{{ old('tanggal_tenggat', \Carbon\Carbon::parse($item->tanggal_tenggat)->format('Y-m-d\TH:i')) }}"
                            class="form-control" id="tanggal_tenggat" required>
                    </div>


                    <div class="mb-3">
                        <label for="catatan_sanksi" class="form-label">Catatan</label>
                        <textarea name="catatan_sanksi" class="form-control" id="catatan_sanksi" rows="3">{{ old('note', $item->catatan_sanksi) }}</textarea>
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
