<div class="container-fluid p-0"> <!-- Single root element with padding -->
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 p-3">
        <div class="d-flex align-items-center">
            
            <h2 class="fw-semibold mb-0">Detail Laporan Kegiatan</h2>
        </div>
        
        <div class="d-flex">
            <a href="{{ route('laporan') }}" class="btn btn-outline-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
            
        </div>
    </div>

    <!-- Informasi Utama Kegiatan -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informasi Kegiatan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama Kegiatan</th>
                            <td>{{ $kegiatan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $kegiatan->tgl_pelaksanaan->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Organisasi</th>
                            <td>{{ $kegiatan->organisasi->nama_organisasi }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $kegiatan->lokasi->nama_lokasi }}</td>
                        </tr>
                    </table>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Daftar Panitia -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"></i>Daftar Panitia</h5>
        </div>
        <div class="card-body">
            @if($kegiatan->kepanitiaans->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Peran/Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatan->kepanitiaans as $panitia)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $panitia->anggota->nama }}</td>
                                <td>{{ $panitia->anggota->nim }}</td>
                                <td>{{ $panitia->jabatan ?? 'Anggota' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>Tidak ada data panitia
                </div>
            @endif
        </div>
    </div>
</div>