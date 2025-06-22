<!-- Blade Template -->
<div>
    @if($kegiatan)
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kelola Panitia: {{ $kegiatan->nama }}</h2>
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Tambah Panitia</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="addPanitia">
                            <div class="mb-3">
                                <label for="anggota_id" class="form-label">Anggota</label>
                                <select class="form-select" id="anggota_id" wire:model="anggota_id">
                                    <option value="">Pilih Anggota</option>
                                    @foreach($anggotas as $anggota)
                                        <option value="{{ $anggota->id }}">{{ $anggota->nama }} ({{ $anggota->nim }})</option>
                                    @endforeach
                                </select>
                                @error('anggota_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" wire:model="jabatan">
                                @error('jabatan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Panitia</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kegiatan->kepanitiaans as $panitia)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $panitia->anggota->nama }}</td>
                                            <td>{{ $panitia->anggota->nim }}</td>
                                            <td>{{ $panitia->jabatan }}</td>
                                            <td>
                                                <button 
                                                    wire:click="deletePanitia({{ $panitia->id }})" 
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus panitia ini?')"
                                                >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">Kegiatan tidak ditemukan</div>
    @endif
</div>