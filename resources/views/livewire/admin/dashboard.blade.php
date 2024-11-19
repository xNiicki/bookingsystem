<div>
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
