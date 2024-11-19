{{-- resources/views/livewire/home.blade.php --}}
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Available Courses</h2>

            <div class="mb-3">
                @foreach($courses as $course)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $course->name }}</h3>
                            <div class="text-muted mb-2">
                                {{ $course->dayName }} - {{ Carbon\Carbon::parse($course->startDate)->format('d.m.Y') }}
                                at {{ Carbon\Carbon::parse($course->startTime)->format('H:i') }}
                            </div>
                            <div class="mb-2">
                <span class="badge {{ $course->isFullyBooked() ? 'bg-danger' : 'bg-success' }}">
                    {{ $course->available_spots }} spots available
                </span>
                            </div>
                            <button
                                wire:click="register({{ $course->id }})"
                                class="btn btn-primary"
                                {{ $course->isFullyBooked() ? 'disabled' : '' }}
                            >
                                {{ $course->isFullyBooked() ? 'Fully Booked' : 'Register' }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($courses->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-calendar-x display-1"></i>
                    <p class="mt-3">No courses available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</div>
