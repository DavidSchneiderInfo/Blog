<div class="mb-3">
    <label for="title" class="form-label">{{ __('Post Title') }}</label>
    <input type="text" class="form-control" id="title" name="title"
        @isset($post)
            value="{{ old('title', $post->title) }}"
        @else
            placeholder="{{ __('Enter a title ...') }}"
        @endif
    >

    @error('title')
        <div class="text-danger rounded-1 p-2">
            {{ $message }}
        </div>
    @enderror
</div>
