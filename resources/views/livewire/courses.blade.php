<div class="container py-4">
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="h5 mb-3">Filters</h3>
                    <div class="mb-3">
                        <input wire:model.live="search" type="text" class="form-control" placeholder="Search courses...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Course Type</label>
                        <select wire:model.live="type" class="form-select">
                            <option value="">All Types</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Courses Section -->
        <div class="col-md-9">
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
                                        onclick="window.location.href='{{ route('register.course', $course->id) }}'"
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
    </div>
</div>
