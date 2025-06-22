<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Kegiatan</h5>
    </div>
    <div class="card-body">
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext">{{ $kegiatan->nama }}</p>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext">
                    {{ $kegiatan->tgl_pelaksanaan ? \Carbon\Carbon::parse($kegiatan->tgl_pelaksanaan)->format('d/m/Y') : '-' }}
                </p>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Organisasi</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext">
                    {{ $kegiatan->organisasi->nama_organisasi ?? '-' }}
                </p>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Lokasi</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext">
                    {{ $kegiatan->lokasi->nama_lokasi ?? '-' }}
                </p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
