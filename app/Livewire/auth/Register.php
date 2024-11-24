<?php

namespace App\Livewire\auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|min:3|max:250',
        'email' => 'required|email|max:250|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        session()->flash('message', 'You have successfully registered & logged in!');
        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
