{{-- resources/views/livewire/home.blade.php --}}
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Available Courses</h2>

            <div class="mb-3">
                @foreach($courses as $course)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="h5 mb-2">{{ $course['name'] }}</h3>
                                    <div class="text-muted">
                                        <i class="bi bi-calendar"></i>
                                        {{ $course['dayName'] }} - {{ $course['formattedDate'] }}
                                    </div>
                                    <div class="text-muted">
                                        <i class="bi bi-clock"></i>
                                        {{ $course['formattedTime'] }}
                                    </div>
                                    <div class="small text-muted mt-1">
                                        <i class="bi bi-collection"></i>
                                        Number of sessions: {{ $course['sessions'] }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button
                                        href="/register/{{ $course['id'] }}"
                                        wire:navigate
                                        class="btn btn-primary"
                                    >
                                        <i class="bi bi-person-plus-fill me-2"></i>
                                        Register
                                    </button>
                                </div>
                            </div>
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
