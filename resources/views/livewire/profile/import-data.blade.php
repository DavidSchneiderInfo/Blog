<form wire:submit.prevent="save"
      x-data="{ isUploading: false, progress: 0 }"
      x-on:livewire-upload-start="isUploading = true"
      x-on:livewire-upload-finish="isUploading = false"
      x-on:livewire-upload-error="isUploading = false"
      x-on:livewire-upload-progress="progress = $event.detail.progress">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="importData" class="form-label">{{ __('Backup file') }}</label>
            <input class="form-control" type="file" id="importData" name="importData" wire:model="importData">
            @error('importData') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Start import') }}</button>
    </div>
</form>
