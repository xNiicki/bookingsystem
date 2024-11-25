<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header py-3 d-flex align-items-center">
                    <button class="btn btn-primary btn-lg" onclick="window.history.back()"><i class="bi bi-arrow-left"></i> Back</button>
                    <h3 class="flex-grow-1 text-center mb-0">{{ $course->name }}</h3>
                    <div class="invisible-spacer" style="width: 92px;"></div>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-muted mb-3">Trainers</h5>
                            @foreach($course->trainers as $trainer)
                                <p class="mb-1"><i class="bi bi-person-fill me-2"></i>{{ $trainer->name }}</p>
                            @endforeach

                            <h5 class="text-muted mt-4 mb-3">Schedule</h5>
                            <p class="mb-1"><i class="bi bi-calendar-event me-2"></i>{{ \Carbon\Carbon::parse($course->startDate)->format('l') }} - {{ Carbon\Carbon::parse($course->startDate)->format('d.m.Y') }}</p>
                            <p><i class="bi bi-clock me-2"></i>{{ Carbon\Carbon::parse($course->startTime)->format('H:i') }} - {{ Carbon\Carbon::parse($course->endTime)->format('H:i') }}</p>

                            <h5 class="text-muted mt-4 mb-3">Description</h5>
                            <p class="card-text">{{ $course->description }}</p>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light p-3 rounded text-center">
                                <h5 class="text-primary mb-3">Available Spots</h5>
                                <p class="display-4 fw-bold">{{ $course->available_spots }}</p>
                            </div>
                            <!-- Button trigger modal -->
                            @if(!Auth::check())
                                <button type="button" class="btn btn-primary btn-lg mt-4 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Register Now</button>
                            @elseif(!Auth::user()->customerCourses->contains($course->id))
                                <button type="button" class="btn btn-primary btn-lg mt-4 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Register Now</button>
                            @else
                                <button type="button" class="btn btn-primary btn-lg mt-4 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>Registered</button>

                            @endif
                            <!-- Modal -->
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mit der Anmeldung bestätigen Sie, dass Sie die <a href="#">AGB</a> gelesen und akzeptiert haben.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Decline</button>
                                            <button type="button" class="btn btn-primary" wire:click="register">Akzeptieren</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(!\Illuminate\Support\Facades\Auth::check())
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  text-white">
                                            <div class="modal-header bg-danger border-bottom-0">
                                                <h5 class="modal-title" id="exampleModalLabel">Not Registered</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-black">
                                                Bitte melden Sie sich an, um fortzufahren.
                                            </div>
                                            <div class="modal-footer border-top-0">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Schließen</button>
                                                <button type="button" class="btn btn-primary" wire:click="redirectToRegister">Registrieren</button>
                                                <button type="button" class="btn btn-primary" wire:click="redirectToLogin">Anmelden</button>
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
