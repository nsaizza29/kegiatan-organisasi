<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function render()
    {
        return <<<'blade'
            <button wire:click="logout" class="dropdown-item">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        blade;
    }
}
