<div>
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input type="text"
               class="form-control"
               id="name"
               wire:model="name"
            {{ ($isActive) ? '' : 'disabled' }}
        >
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Email') }}</label>
        <input type="email"
               class="form-control"
               id="email"
               wire:model="email"
               {{ ($isActive) ? '' : 'disabled' }}
        >
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
