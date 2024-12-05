@props(['blog', 'comments'])
<section class="container">
    <div class="col-md-8  mx-auto">


        @auth
            <x-comment-form :blog="$blog" />
        @else
            <p class="my-4 text-center fw-bold">You need to <a href="/login">Login</a> first to participate in this discussion!</p>
        @endauth


        <h5 class="my-3 text-secondary">{{ $blog->comments->count() ? 'Comments - '.$blog->comments->count() : '' }}</h5>

        @foreach ($comments as $comment)
            <x-single-comment :comment="$comment" />
        @endforeach


        {{ $comments->links() }}

    </div>
</section>
