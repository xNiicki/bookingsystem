{{-- resources/views/livewire/admin/course.blade.php --}}
<div class="container py-4">
    <div class="mb-3">
        <a href="{{ route('admin.courses') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Course List
        </a>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 mb-0">{{ $course->name }} - Registered Customers</h2>
        </div>


        <div class="card-body">
            @if($customers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Registration Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>
                                    <button
                                        class="btn btn-sm btn-danger"
                                        wire:click="removeCustomer({{ $customer->id }})"
                                        wire:confirm="Are you sure you want to remove this customer from the course?"
                                    >
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    No customers registered for this course yet.
                </div>
            @endif
        </div>
    </div>
</div>
