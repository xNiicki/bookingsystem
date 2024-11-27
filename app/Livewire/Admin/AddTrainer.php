<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddTrainer extends Component
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
            'type' => 'admin'
        ]);

        session()->flash('message', 'Trainer added successfully!');

        $this->reset();
    }


    public function render()
    {
        return view('livewire.admin.add-trainer')
            ->layout('components.layouts.admin');
    }
}
