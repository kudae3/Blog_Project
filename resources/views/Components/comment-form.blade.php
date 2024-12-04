@props(['blog'])

<x-comment-wrapper class="border border-info">
    <form method="post" action="/blogs/{{ $blog->slug }}/comment">
        @csrf
        <div class="mb-3">
            <textarea name="comment" class="form-control" id="" rows="7" placeholder="Write Something ..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary float-end">Submit</button>
    </form>
    <x-error-msg name="comment" />
</x-comment-wrapper>
