<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Laporan Kegiatan</h2>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Cari kegiatan..." wire:model.live="search">
                </div>
                <div class="col-md-4">
                    <select class="form-select" wire:model.live="organisasiFilter">
                        <option value="">Semua Organisasi</option>
                        @foreach($organisasis as $org)
                            <option value="{{ $org->id }}">{{ $org->nama_organisasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" wire:model.live="lokasiFilter">
                        <option value="">Semua Lokasi</option>
                        @foreach($lokasis as $lokasi)
                            <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Organisasi</th>
                            <th>Lokasi</th>
                            <th style="align-content: center; text-align:center">Jumlah Panitia</th>
                            <th style="align-content: center; text-align:center">Aksi<th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatans as $kegiatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kegiatan->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($kegiatan->tgl_pelaksanaan)->format('d/m/Y') }}</td>
                                <td>{{ $kegiatan->organisasi->nama_organisasi }}</td>
                                <td>{{ $kegiatan->lokasi->nama_lokasi }}</td>
                                <td style="align-content: center; text-align:center">{{ $kegiatan->kepanitiaans_count }}</td>
                                <td style="align-content: center; text-align:center">
                                <a href="{{ route('laporan.show', $kegiatan->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Lihat Laporan
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
    {{ $kegiatans->links('pagination::bootstrap-5') }}
</div>


        </div>
    </div>
</div>