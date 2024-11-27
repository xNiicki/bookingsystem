<div class="row"><!-- Filter Sidebar -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h3 class="h5 mb-3">Filters</h3>
                <div class="mb-3">
                    <input wire:model.live="search" type="text" class="form-control" placeholder="Kurs eingeben....">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kursart</label>
                    <select wire:model.live="selectedType" class="form-select">
                        <option value="">Alle Arten</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div x-data="{ copied: false }">
                        <button
                            @click="navigator.clipboard.writeText('booking.janine-lorenz.de/?type={{$selectedType}}').then(() => { copied = true; setTimeout(() => copied = false, 2000); })"
                            class="btn btn-primary"
                        >
                            Filterlink kopieren
                        </button>
                        <span x-show="copied" class="text-green-500">Copied!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title h4 mb-4">Verfügbare Kurse</h2>

                <div class="mb-3">
                    @foreach($courses as $course)
                        <div class="card mb-3">
                            <div class="card-body d-flex">
                                <div class="course-info flex-grow-1">
                                    <h3 class="card-title">{{ $course->name }}</h3>
                                    <dl class="row mb-0">
                                        <dt class="col-sm-3">Tag:</dt>
                                        <dd class="col-sm-9">{{Carbon\Carbon::parse($course->startDate)->isoFormat('dddd') }}
                                            - {{ Carbon\Carbon::parse($course->startDate)->format('d.m.Y') }}
                                            um {{ Carbon\Carbon::parse($course->startTime)->format('H:i') }}</dd>

                                        <dt class="col-sm-3">Notiz:</dt>
                                        <dd class="col-sm-9">{{ $course->notes }}</dd>

                                        <dt class="col-sm-3">Preis:</dt>
                                        <dd class="col-sm-9">{{ $course->price }}€</dd>
                                    </dl>
                                    <div class="mt-2">
                <span class="badge {{ $course->isFullyBooked() ? 'bg-danger' : 'bg-success' }}">
                    {{ $course->available_spots }} Plätze verfügbar
                </span>
                                    </div>
                                    <button
                                        onclick="window.location.href='{{ route('course', $course->id) }}'"
                                        class="btn btn-primary mt-2"
                                        {{ $course->isFullyBooked() ? 'disabled' : '' }}
                                    >
                                        {{ $course->isFullyBooked() ? 'Ausgebucht' : 'Registrieren' }}
                                    </button>
                                </div>
                                <div class="course-image ml-3">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($course->picture) }}"
                                         alt="{{ $course->name }}" class="img-fluid rounded"
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($courses->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-calendar-x display-1"></i>
                        <p class="mt-3">Gerade keine Kurse verfügbar</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
