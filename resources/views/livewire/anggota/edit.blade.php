<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit Anggota</h4>
                <a href="{{ route('anggota.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               id="nama" wire:model="nama">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror"
                               id="nim" wire:model="nim">
                        @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="organisasi_id" class="form-label">Organisasi</label>
                    <select class="form-select @error('organisasi_id') is-invalid @enderror"
                            id="organisasi_id" wire:model="organisasi_id">
                        <option value="">Pilih Organisasi</option>
                        @foreach($organisasis as $org)
                            <option value="{{ $org->id }}" {{ $org->id == $organisasi_id ? 'selected' : '' }}>
                                {{ $org->nama_organisasi }}
                            </option>
                        @endforeach
                    </select>
                    @error('organisasi_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
