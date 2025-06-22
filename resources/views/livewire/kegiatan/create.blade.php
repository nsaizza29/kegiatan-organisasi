<div>
    <div class="card">
        <div class="card-header">
            <h4>{{ isset($kegiatan_id) ? 'Edit' : 'Tambah' }} Kegiatan</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ isset($kegiatan_id) ? 'update' : 'store' }}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" wire:model="nama">
                    @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                    <input type="date" class="form-control" id="tgl_pelaksanaan" wire:model="tgl_pelaksanaan">
                    @error('tgl_pelaksanaan') <span class="text-danger">{{ $message }}</span> @enderror
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
                <div class="mb-3">
                    <label for="lokasi_id" class="form-label">Lokasi</label>
                    <select class="form-select" id="lokasi_id" wire:model="lokasi_id">
                        <option value="">Pilih Lokasi</option>
                        @foreach($lokasis as $lokasi)
                            <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                        @endforeach
                    </select>
                    @error('lokasi_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>