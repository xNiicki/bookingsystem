<?php

namespace App\Livewire\Component\Admin;

use App\Models\Filter;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateFilter extends Component
{

    public $type = '';
    public $description = '';


    public function submit()
    {
        $this->validate([
            'type' => 'required|string',
            'description' => 'required|string'
        ]);
        Log::debug('Type: ' . $this->type);
        Log::debug('Description: ' . $this->description);


        Filter::create([
            'type' => $this->type,
            'description' => $this->description
        ]);

        session()->flash('message', 'Filter created successfully.');
        $this->reset(['type', 'description']);
    }



    public function render()
    {
        return view('livewire.component.admin.create-filter');
    }
}
