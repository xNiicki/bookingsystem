<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedType = '';
    public $name = '';
    public $shareUrl = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Check if 'type' query parameter is set and assign it to $type
        $this->selectedType = request()->query('type', ''); // Default to empty string if not set
    }

    public function shareFilters()
    {
        // kopiere den link in die Zwischenablage

        $url = url()->current();
        $url = $url . '?type=' . $this->selectedType;

        $this->shareUrl = $url;
    }

    public function render()
    {
        Carbon::setLocale('de');


        $courses = Course::query()
            ->when($this->search, fn ($query) => $query->where('name', 'like', '%' . $this->search . '%'))
            ->when($this->selectedType, fn ($query) => $query->whereHas('filters', fn ($q) => $q->where('Type', $this->selectedType)))
            ->when($this->name, fn ($query) => $query->whereHas('filters', fn ($q) => $q->where('Name', $this->name)))
            ->paginate(10);

        return view('livewire.courses', [
            'courses' => $courses,
            'types' => \App\Models\Filter::distinct('type')->pluck('type'),
        ]);
    }
}
