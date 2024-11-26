<div class="card">
    <div class="card-header bg-primary text-white">
        <h2 class="h4 mb-0">{{ $course->name }} - {{ Carbon\Carbon::parse($course->startDate)->format('l') }} {{ Carbon\Carbon::parse($course->startTime)->format('H:i') }}</h2>
    </div>
    <div class="card-body">
        @if($attendanceRecords !== [])
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead class="thead-light">
                    <tr>
                        <th>Kunden</th>
                        @for ($i = 1; $i <= $course->sessions; $i++)
                            <th class="text-center">Termin {{ $i }}</th>
                        @endfor
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($course->customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            @for ($session = 1; $session <= $course->sessions; $session++)
                                <td class="text-center">
                                    <button type="button"
                                            class="btn btn-sm {{ $attendanceRecords[$customer->id][$session] ? 'btn-success' : 'btn-danger' }}"
                                            wire:click="toggleAttendance({{ $customer->id }}, {{ $session }})">
                                        {{ $attendanceRecords[$customer->id][$session] ? 'Anwesend' : 'Abwesend' }}
                                    </button>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                Für diesen Kurs wurden keine Anwesenheitslisten gefunden.
            </div>
        @endif
    </div>
</div>
