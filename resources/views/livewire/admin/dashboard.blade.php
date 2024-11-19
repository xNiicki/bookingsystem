<div>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
        <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
            <i class="fas fa-bars">III</i>
        </button>
    </div>

    <div class="alert alert-success" role="alert">
        Welcome, {{ Auth::user()->name }}!
    </div>

    <!-- Add more dashboard content here -->

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>
