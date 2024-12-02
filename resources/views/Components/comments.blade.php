@props(['blog','comments'])
<section class="container">
    <div class="col-md-8  mx-auto">


        @auth
            <x-comment-wrapper class="border border-info">
                <form method="post" action="/blogs/{{ $blog->slug }}/comment">
                    @csrf
                    <div class="mb-3">
                        <textarea name="comment" class="form-control" id="" rows="7" placeholder="Write Something ..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
                @error('comment')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </x-comment-wrapper>
        @endauth


        <h5 class="my-3 text-secondary">{{ $comments->count() ? 'Comments - '.$comments->count() : '' }}</h5>

        @foreach ($comments as $comment)
            <x-single-comment :comment="$comment" />
        @endforeach

    </div>
</section>
