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
    public $type = '';
    public $name = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        Carbon::setLocale('de');


        $courses = Course::query()
            ->when($this->search, fn ($query) => $query->where('name', 'like', '%' . $this->search . '%'))
            ->when($this->type, fn ($query) => $query->whereHas('filters', fn ($q) => $q->where('Type', $this->type)))
            ->when($this->name, fn ($query) => $query->whereHas('filters', fn ($q) => $q->where('Name', $this->name)))
            ->paginate(10);

        return view('livewire.courses', [
            'courses' => $courses,
            'types' => \App\Models\Filter::distinct('type')->pluck('type'),
        ]);
    }
}
