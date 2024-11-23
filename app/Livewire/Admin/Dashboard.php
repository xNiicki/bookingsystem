<?php

namespace App\Livewire\Admin;

use http\Env\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{

    public function logout(\Illuminate\Http\Request $request)
    {
        $isAdmin = Auth::user() && Auth::user()->type === 'admin';
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect($isAdmin ? '/admin/login' : '/login');
    }
    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('components.layouts.admin');
    }
}
