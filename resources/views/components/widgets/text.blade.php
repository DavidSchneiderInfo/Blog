<div class="card mb-3">
    @isset($title)
        <div class="card-header">{{ $title }}</div>
    @endisset
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
