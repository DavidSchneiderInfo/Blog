<div class="post">
    <h2 class="post-title">{{ $post->title }}</h2>
    <ul class="post-meta">
        <li class="bg-primary">
            {{ $post->created_at->diffForHumans() }}
        </li>
    </ul>
    <div class="post-body">
        {{ $slot }}
    </div>
</div>
