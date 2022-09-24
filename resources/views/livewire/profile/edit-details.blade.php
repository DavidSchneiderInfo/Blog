<div>
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input type="text"
               class="form-control"
               id="name"
               wire:model.defer="name"
                {{ $isActive ? '' : 'disabled' }}
        >
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Email') }}</label>
        <input type="text"
               class="form-control"
               id="email"
               wire:model.defer="email"
               {{ $isActive ? '' : 'disabled' }}
        >
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>

    @if($isActive)
        <button type="button"
                class="btn btn-danger"
                wire:click="deactivate"
        >
            {{ __('Cancel') }}
        </button>
        <button type="button"
                class="btn btn-success"
                wire:click="save"
        >
            {{ __('Save') }}
        </button>
    @else
        <button type="button"
                class="btn btn-{{ ($isActive) ? 'primary' : 'secondary' }}"
                wire:click="activate"
        >
            {{ __('Edit') }}
        </button>
    @endif
</div>
