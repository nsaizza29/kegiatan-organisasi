<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\{Login, Register};
use App\Livewire\Anggota\{Show, Create, Edit, Index as AnggotaIndex};
use App\Livewire\Kegiatan\{Show as KegiatanShow, Create as KegiatanCreate, Edit as KegiatanEdit, Index as KegiatanIndex};
use App\Livewire\Kepanitiaan\Manage;
use App\Livewire\Laporan;
use App\Livewire\LaporanShow;
use App\Livewire\Dashboard;




// Route untuk user yang belum login (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Route untuk user yang sudah login (auth)
Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    // Kegiatan
    Route::get('/kegiatan', KegiatanIndex::class)->name('kegiatan.index');
    Route::get('/kegiatan/create', KegiatanCreate::class)->name('kegiatan.create');
    Route::get('/kegiatan/{id}/edit', KegiatanEdit::class)->name('kegiatan.edit');
    Route::get('/kegiatan/{id}/show', KegiatanShow::class)->name('kegiatan.show');




    // Anggota
    Route::get('/anggota', AnggotaIndex::class)->name('anggota.index');
    Route::get('/anggota/create', Create::class)->name('anggota.create');
    Route::get('/anggota/{id}/edit', Edit::class)->name('anggota.edit');
    Route::get('/anggota/{id}/show', Show::class)->name('anggota.show');

    // Kepanitiaan
    Route::get('/kegiatan/{id}/panitia', Manage::class)->name('kepanitiaan.manage');

    // Laporan
    Route::get('/laporan', Laporan::class)->name('laporan');
    Route::get('/laporan/{id}/show', LaporanShow::class)->name('laporan.show');
    

    
});
