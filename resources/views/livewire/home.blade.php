<div>
    <div class="container py-4">
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <livewire:courses/>
        </div>
    </div>
</div>
