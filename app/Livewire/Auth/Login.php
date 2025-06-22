<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password, $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember)) {
            return redirect()->intended('/');
        }

        $this->addError('email', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.app');
    }
}
