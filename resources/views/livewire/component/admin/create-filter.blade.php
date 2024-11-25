<div>
    @if (session()->has('error'))
        <div class="alert alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Filter</h1>
    </div>
    <div class="modal-body">
        <form wire:submit="submit">
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text"
                       class="form-control @error('type') is-invalid @enderror"
                       id="type"
                       wire:model="type">
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="description"
                          wire:model="description"
                          rows="3"></textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="$refresh" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Create</button>
            </div>
        </form>



    </div>

</div>
