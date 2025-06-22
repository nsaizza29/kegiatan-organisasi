<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Anggota</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="30%">No</th>
                <td>{{ $anggota->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $anggota->nama }}</td>
            </tr>
            <tr>
                <th>NIM</th>
                <td>{{ $anggota->nim }}</td>
            </tr>
            <tr>
                <th>Organisasi</th>
                <td>{{ $anggota->organisasi->nama_organisasi }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>