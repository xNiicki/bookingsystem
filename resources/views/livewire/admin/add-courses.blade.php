{{-- resources/views/livewire/admin/add-course.blade.php --}}
<div class="container py-4">
    <div class="mb-3">
        <a href="{{ route('admin.courses') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Courses
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 mb-0">Add New Course</h2>
        </div>

        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit="submit">
                <div class="mb-3">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           wire:model="name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date"
                               class="form-control @error('startDate') is-invalid @enderror"
                               id="startDate"
                               wire:model="startDate">
                        @error('startDate')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="startTime" class="form-label">Start Time</label>
                        <input type="time"
                               class="form-control @error('startTime') is-invalid @enderror"
                               id="startTime"
                               wire:model="startTime">
                        @error('startTime')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="dayName" class="form-label">Day of Week</label>
                        <select class="form-select @error('dayName') is-invalid @enderror"
                                id="dayName"
                                wire:model="dayName">
                            <option value="">Select a day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        @error('dayName')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="sessions" class="form-label">Number of Sessions</label>
                        <input type="number"
                               class="form-control @error('sessions') is-invalid @enderror"
                               id="sessions"
                               wire:model="sessions"
                               min="1">
                        @error('sessions')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Maximum Capacity</label>
                        <input type="number"
                               class="form-control @error('capacity') is-invalid @enderror"
                               id="capacity"
                               wire:model="capacity"
                               min="1">
                        @error('capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading.remove wire:target="submit">
                            <i class="bi bi-plus-circle me-2"></i>Add Course
                        </span>
                        <span wire:loading wire:target="submit">
                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                            Creating...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
