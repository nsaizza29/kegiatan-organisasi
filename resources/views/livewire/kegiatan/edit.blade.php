<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit Kegiatan</h4>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" wire:model="nama">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                        <input type="date" class="form-control @error('tgl_pelaksanaan') is-invalid @enderror" 
                               id="tgl_pelaksanaan" wire:model="tgl_pelaksanaan">
                        @error('tgl_pelaksanaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="organisasi_id" class="form-label">Organisasi</label>
                        <select class="form-select @error('organisasi_id') is-invalid @enderror" 
                                id="organisasi_id" wire:model="organisasi_id">
                            <option value="">Pilih Organisasi</option>
                            @foreach($organisasis as $org)
                                <option value="{{ $org->id }}" {{ $org->id == $organisasi_id ? 'selected' : '' }}>
                                    {{ $org->nama_organisasi }} ({{ $org->jenis }})
                                </option>
                            @endforeach
                        </select>
                        @error('organisasi_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lokasi_id" class="form-label">Lokasi</label>
                        <select class="form-select @error('lokasi_id') is-invalid @enderror" 
                                id="lokasi_id" wire:model="lokasi_id">
                            <option value="">Pilih Lokasi</option>
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}" {{ $lokasi->id == $lokasi_id ? 'selected' : '' }}>
                                    {{ $lokasi->nama_lokasi }} - {{ $lokasi->alamat }}
                                </option>
                            @endforeach
                        </select>
                        @error('lokasi_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
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