@props(['blog', 'randomBlogs'])
<x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">

            <div class="col-md-6 mx-auto text-center">

                <img
                src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                class="card-img-top"
                alt="..."
            />

            <form action="" method="post">
                @auth
                    @if (auth()->user()->isSubscribed($blog))
                        <button type="submit" class="btn btn-danger my-2">Unsubscribe</button>
                    @else
                        <button type="submit" class="btn btn-primary my-2">Subscribe</button>
                    @endif
                @endauth
            </form>

            <h3 class="my-4">{{$blog->title}}</h3>

            <div>
                <a href='/?={{$blog->category->name}}'>
                    <btn class="btn btn-primary p-2 mb-2">{{$blog->category->name}}</btn>
                </a>
                <a href='/?={{$blog->author->username}}'>
                    <p class="fw-bold my-3">{{$blog->author->name}}</p>
                </a>
                <p>{{$blog->created_at->diffForHumans()}}</p>
            </div>

            <p class="lh-md">{{$blog->body}}</p>
            </div>
        </div>
    </div>

    @if ($blog->comments->count())
        <x-comments :blog="$blog"
                    :comments="$blog->comments()->latest()->paginate(3)" />
    @endif

    <x-suggest-blogs :blogs="$randomBlogs" />

</x-layout>





