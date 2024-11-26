{{-- resources/views/livewire/admin/add-course.blade.php --}}
<div class="container py-4">
    <div class="mb-3">
        <a href="{{ route('admin.courses') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>
            Zurück
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 mb-0">Neuen Kurs hinzufügen</h2>
        </div>

        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit="submit">
                <div class="mb-3">
                    <label for="name" class="form-label">Kurs Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           wire:model="name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Beschreibung</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description"
                              wire:model="description"
                              rows="3"></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Datum</label>
                    <input type="date"
                           class="form-control @error('startDate') is-invalid @enderror"
                           id="startDate"
                           wire:model="startDate">
                    @error('startDate')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="startTime" class="form-label">Start Zeit</label>
                        <input type="time"
                               class="form-control @error('startTime') is-invalid @enderror"
                               id="startTime"
                               wire:model="startTime">
                        @error('startTime')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="endTime" class="form-label">End Zeit</label>
                        <input type="time"
                               class="form-control @error('endTime') is-invalid @enderror"
                               id="endTime"
                               wire:model="endTime">
                        @error('endTime')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="sessions" class="form-label">Anzahl der Termine</label>
                        <input type="number"
                               class="form-control @error('sessions') is-invalid @enderror"
                               id="sessions"
                               wire:model="sessions"
                               min="1">
                        @error('sessions')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="capacity" class="form-label">Maximale Anzahl der Teilnehmer</label>
                        <input type="number"
                               class="form-control @error('capacity') is-invalid @enderror"
                               id="capacity"
                               wire:model="capacity"
                               min="1">
                        @error('capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Preis</label>
                        <input type="number"
                               class="form-control @error('price') is-invalid @enderror"
                               id="price"
                               wire:model="price"
                               min="1">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trainer" class="form-label">Trainer</label>
                        <select class="form-select @error('trainer') is-invalid @enderror"
                                id="trainer"
                                wire:model="trainer">
                            <option value="">Select a trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                        @error('trainer')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="filter" class="form-label">Filter</label>
                        <div class="d-flex flex-column">
                            <div class="selected-filters mb-2">
                                @if ($selectedFilter)
                                @foreach($selectedFilter as $option)
                                    <span class="badge bg-primary me-1">{{ \App\Models\Filter::find($option)->type }}</span>
                                @endforeach
                                @endif
                            </div>
                            <div class="input-group">
                                <select class="form-select @error('filter') is-invalid @enderror"
                                        id="filter"
                                        wire:model.live="filter">
                                    <option value="">Filter auswählen</option>
                                    @foreach($filters as $filter)
                                        <option value="{{ $filter->id }}"
                                                class="@if(in_array($filter->id, $this->selectedFilter)) bg-primary @endif">
                                            {{ $filter->type }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#createFilterModel">
                                    <i class="fas fa-plus"> + </i>
                                </button>
                            </div>
                        </div>
                        @error('filter')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="picture" class="form-label">Bild</label>
                        <input type="file"
                               class="form-control @error('picture') is-invalid @enderror"
                               id="picture"
                               wire:model.live="picture">
                        @error('picture')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading.remove wire:target="submit">
                            <i class="bi bi-plus-circle me-2"></i>Kurs hinzufügen
                        </span>
                        <span wire:loading wire:target="submit">
                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                            Erstellen...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="createFilterModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <livewire:component.admin.create-filter/>
            </div>
        </div>
    </div>
</div>
