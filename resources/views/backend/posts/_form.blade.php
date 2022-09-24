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
<div class="mb-3">
  <label for="content" class="form-label">{{ __('Content') }}</label>
  <textarea 
        class="form-control" 
        id="content" 
        name="content" 
        rows="3">{{ isset($post) ? old('content', $post->content) : '' }}</textarea>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
ClassicEditor
    .create( document.querySelector('#content'))
    .catch( error => {
        console.log( error );
    } );
</script>