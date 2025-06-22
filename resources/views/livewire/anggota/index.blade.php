<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Anggota</h2>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Cari anggota..." wire:model.live="search">
                </div>
                <div class="col-md-6">
                    <select class="form-select" wire:model.live="organisasiFilter">
                        <option value="">Semua Organisasi</option>
                        @foreach($organisasis as $org)
                            <option value="{{ $org->id }}">{{ $org->nama_organisasi }}</option>
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
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Organisasi</th>
                            <th style="align-content: center; text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggotas as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->nim }}</td>
                                <td>{{ $anggota->organisasi->nama_organisasi }}</td>
                                <td class="text-center">
                                <a href="{{ route('anggota.show', $anggota->id) }}" class="btn btn-sm btn-info me-1" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button wire:click="delete({{ $anggota->id }})" class="btn btn-sm btn-danger" title="Hapus"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
    {{ $anggotas->links('pagination::bootstrap-5') }}
</div>

        </div>
    </div>
</div>