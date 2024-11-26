<div>
    @foreach($courses as $course)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="h5 mb-2">{{ $course['name'] }}</h3>
                        <div class="text-muted
                        ">
                            <i class="bi bi-calendar"></i>
                            {{ $course['dayName'] }} - {{ $course['formattedDate'] }}
                        </div>
                        <div class="text-muted
                        ">
                            <i class="bi bi-clock"></i>
                            {{ $course['formattedTime'] }}
                        </div>
                        <div class="small text
                        -muted mt-1">
                            <i class="bi bi-collection"></i>
                            Anzahl der Termine: {{ $course['sessions'] }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <button
                            href="/admin/course/{{ $course['id'] }}"
                            wire:navigate
                            class="btn btn-primary"
                        >
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Show Info
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
