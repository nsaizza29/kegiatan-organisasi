<div>
    <div class="card">
        <div class="card-header">
            <h4>{{ isset($anggota_id) ? 'Edit' : 'Tambah' }} Anggota</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ isset($anggota_id) ? 'update' : 'store' }}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" wire:model="nama">
                    @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" wire:model="nim">
                    @error('nim') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="organisasi_id" class="form-label">Organisasi</label>
                    <select class="form-select" id="organisasi_id" wire:model="organisasi_id">
                        <option value="">Pilih Organisasi</option>
                        @foreach($organisasis as $org)
                            <option value="{{ $org->id }}">{{ $org->nama_organisasi }}</option>
                        @endforeach
                    </select>
                    @error('organisasi_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>