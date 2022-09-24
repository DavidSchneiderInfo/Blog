<div class="mb-3">
    <label for="title" class="form-label">{{ __('Post Title') }}</label>
    <input type="text"
           class="form-control"
           id="title"
           name="title"
           placeholder="{{ __('Enter a title ...') }}"
           @isset($post)
               value="{{ old('title', $post->title) }}"
           @else
               value="{{ old('title') }}"
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
  <textarea name="content" id="content">{!! isset($post) ? old('content', $post->content) : '' !!}</textarea>

    @error('content')
    <div class="text-danger rounded-1 p-2">
        {{ $message }}
    </div>
    @enderror
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    class MyUploadAdapter {
        constructor( loader ) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            xhr.open( 'POST', "{{route('backend.posts.image_upload', ['_token' => csrf_token() ])}}", true );
            xhr.responseType = 'json';
        }

        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                resolve( response );
            } );

            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        _sendRequest( file ) {
            const data = new FormData();

            data.append( 'upload', file );

            this.xhr.send( data );
        }
    }

    function MyCustomUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
    }

    ClassicEditor
        .create( document.querySelector('#content'), {
            extraPlugins: [ MyCustomUploadAdapterPlugin ],
        } )
        .catch( error => {
            console.log( error );
        } );
</script>
