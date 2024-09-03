<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div>
            <label for="name">Name</label>
            <input type="text" class="form-control"  id="name" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" class="form-control"  id="email" wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" class="form-control"  id="password" wire:model="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
