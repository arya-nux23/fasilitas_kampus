<div class="modal fade" id="modalEdit{{ $item->id_peminjam }}" tabindex="-1"
    aria-labelledby="modalEditLabel{{ $item->id_peminjam }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalEditLabel{{ $item->id_peminjam }}">Edit Peminjaman</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('peminjam.update', $item->id_peminjam) }}">
                    @csrf
                    @method('PUT')

                    <!-- Nama Fasilitas -->
                    <div class="mb-3">
                        <label for="fasilitas_id_{{ $item->id_peminjam }}" class="form-label">Nama Fasilitas</label>
                        <select class="form-select" id="fasilitas_id_{{ $item->id_peminjam }}" name="fasilitas_id"
                            required>
                            <option value="" disabled>Pilih Fasilitas</option>
                            @foreach ($fasilitas as $a)
                                <option value="{{ $a->id_fasilitas }}"
                                    {{ $item->fasilitas_id == $a->id_fasilitas ? 'selected' : '' }}>
                                    {{ $a->nama_fasilitas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal Tenggat -->
                    <div class="mb-3">
                        <label for="tanggal_tenggat_{{ $item->id_peminjam }}" class="form-label">Tanggal Tenggat</label>
                        <input type="date" name="tanggal_tenggat"
                            value="{{ \Carbon\Carbon::parse($item->tanggal_tenggat)->format('Y-m-d') }}"
                            class="form-control" id="tanggal_tenggat_{{ $item->id_peminjam }}" required>

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
