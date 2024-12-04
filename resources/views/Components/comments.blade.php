@props(['blog','comments'])
<section class="container">
    <div class="col-md-8  mx-auto">


        @auth
            <x-comment-form :blog="$blog" />
        @endauth


        <h5 class="my-3 text-secondary">{{ $comments->count() ? 'Comments - '.$comments->count() : '' }}</h5>

        @foreach ($comments as $comment)
            <x-single-comment :comment="$comment" />
        @endforeach

    </div>
</section>
