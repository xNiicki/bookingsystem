<?php

namespace App\Livewire\auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLogin extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'type' => 'admin'])) {
            session()->flash('message', 'Admin logged in successfully');
            return redirect()->intended('/admin/dashboard');
        }

        $this->addError('email', 'Invalid admin credentials.');
    }

    public function render()
    {
        return view('livewire.auth.admin-login');
    }
}
