@props(['comment'])
<x-comment-wrapper>
    <div class="d-flex">
        <div>
            <img
                src={{ $comment->user->avatar }}
                width="50"
                height="50"
                class="rounded-circle"
                alt=""
            >
        </div>
        <div class="ms-3">
            <h6>{{ $comment->user->name }}</h6>
            <p class="text-secondary">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <p class="mt-1">
        {{ $comment->body }}
    </p>
</x-comment-wrapper>



