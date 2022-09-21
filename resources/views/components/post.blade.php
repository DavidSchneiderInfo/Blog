<div class="post">
    <h3 class="post-title">{{ $post->title }}</h3>
    <ul class="post-meta">
        <li class="bg-primary">
            {{ $post->created_at->diffForHumans() }}
        </li>
    </ul>
    <div class="post-body">
        {{ $slot }}
    </div>
</div>
