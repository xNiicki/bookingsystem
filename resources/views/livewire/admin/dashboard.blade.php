<div>
    <div class="alert alert-success" role="alert">
        Welcome, {{ Auth::user()->name }}!
    </div>

    <!-- Add more dashboard content here -->

    <button wire:click="logout" class="btn btn-danger">Logout</button>
</div>
