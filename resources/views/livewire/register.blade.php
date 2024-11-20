{{-- resources/views/livewire/course-registration.blade.php --}}
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h2>Register for Course: {{ $course->name }}</h2>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit="register">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" wire:model="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <h4>Course Details:</h4>
                    <p><strong>Description:</strong>{{ $course->description }}</p>
                    <p><strong>Start Date:</strong> {{ $course->startDate }}</p>
                    <p><strong>Time:</strong> {{ $course->startTime }}</p>
                    <p><strong>Day:</strong> {{ $course->dayName }}</p>
                    <p><strong>Number of Sessions:</strong> {{ $course->sessions }}</p>
                    <p><strong>Price:</strong> {{ $course->price }}€</p>
                    <p><strong>Trainer:</strong> {{ $course->trainers->first()->name }}</p>
                </div>

                <button type="submit" class="btn btn-primary">
                    Register
                    <div wire:loading wire:target="register" class="spinner-border spinner-border-sm ms-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
