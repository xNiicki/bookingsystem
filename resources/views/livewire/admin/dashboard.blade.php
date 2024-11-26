<div>
    <div class="alert alert-success" role="alert">
        Willkommen, {{ Auth::user()->name }}!
    </div>

    <!-- Add more dashboard content here -->

    <button wire:click="logout" class="btn btn-danger">Abmelden</button>
</div>
