<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header py-3 d-flex align-items-center">
                    <button class="btn btn-primary btn-lg" onclick="window.history.back()"><i
                            class="bi bi-arrow-left"></i> Zurück
                    </button>
                    <h3 class="flex-grow-1 text-center mb-0">{{ $course->name }}</h3>
                    <div class="invisible-spacer" style="width: 92px;"></div>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-8">

                            <dl class="row mb-0">
                                <dt class="col-sm-3">Kursleitung:</dt>
                                <dd class="col-sm-9"> @foreach($course->trainers as $trainer)
                                        {{ $trainer->name }}
                                    @endforeach</dd>

                                <dt class="col-sm-3">Starttermin:</dt>
                                <dd class="col-sm-9">{{ Carbon\Carbon::parse($course->startDate)->format('l') }}
                                    - {{ Carbon\Carbon::parse($course->startDate)->format('d.m.Y') }}
                                    at {{ Carbon\Carbon::parse($course->startTime)->format('H:i') }}</dd>

                                <dt class="col-sm-3">Preis:</dt>
                                <dd class="col-sm-9">{{ $course->price }}€</dd>

                                <dt class="col-sm-3">Notizen:</dt>
                                <dd class="col-sm-9">{{ $course->notes }}</dd>

                                <dt class="col-sm-3">Beschreibung:</dt>
                                <dd class="col-sm-9">{{ $course->description }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded text-center">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($course->picture) }}"
                                     alt="{{ $course->name }}" class="img-fluid rounded"
                                     style="width: 150px; height: 150px; object-fit: cover;">

                            </div>
                            <div class="mt-2">
                                <span class="badge {{ $course->isFullyBooked() ? 'bg-danger' : 'bg-success' }}">
                                    {{ $course->available_spots }} Plätze verfügbar
                                </span>
                                <!-- Button trigger modal -->
                                @if(!Auth::check())
                                    <button type="button" class="btn btn-primary btn-lg mt-4 w-100"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Registrieren
                                    </button>
                                @elseif(!Auth::user()->customerCourses->contains($course->id))
                                    <button type="button" class="btn btn-primary btn-lg mt-4 w-100"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Anmelden
                                    </button>
                                @else
                                    <button type="button" class="btn btn-primary btn-lg mt-4 w-100"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>Bereits
                                        Registriert
                                    </button>

                                @endif
                                <!-- Modal -->
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">.</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Mit der Anmeldung bestätigen Sie, dass Sie die <a
                                                        href="https://janine-lorenz.de/AGB/">AGB</a> gelesen und
                                                    akzeptiert haben.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Abbrechen
                                                    </button>
                                                    <button type="button" class="btn btn-primary" wire:click="register">
                                                        Akzeptieren
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif(!\Illuminate\Support\Facades\Auth::check())
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content  text-white">
                                                <div class="modal-header bg-danger border-bottom-0">
                                                    <h5 class="modal-title" id="exampleModalLabel">Nicht
                                                        Registriert</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-black">
                                                    Bitte melden Sie sich an, um fortzufahren.
                                                </div>
                                                <div class="modal-footer border-top-0">
                                                    <button type="button" class="btn btn-outline-danger"
                                                            data-bs-dismiss="modal">Schließen
                                                    </button>
                                                    <button type="button" class="btn btn-primary"
                                                            wire:click="redirectToRegister">Registrieren
                                                    </button>
                                                    <button type="button" class="btn btn-primary"
                                                            wire:click="redirectToLogin">Anmelden
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
