<div class="post">
    <h3 class="post-title">{{ $post->title }}</h3>
    <ul class="post-meta">
        @if($post->created_at->ne($post->updated_at))
            <li class="bg-secondary">
                <i class="fa-solid fa-rotate"></i>
                {{ $post->updated_at->diffForHumans() }}
            </li>
        @endif

        @if($post->published_at)
            <li class="bg-success">
                <i class="fa-solid fa-hourglass-end"></i>
                {{ $post->published_at->diffForHumans() }}
            </li>
        @else
            <li class="bg-primary">
                <i class="fa-solid fa-calendar-plus"></i>
                {{ $post->created_at->diffForHumans() }}
            </li>
        @endif
    </ul>
    <div class="post-body">
        {{ $slot }}
    </div>
</div>
