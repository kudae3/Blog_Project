@props(['blog', 'randomBlogs'])
<x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">

            <div class="col-md-6 mx-auto text-center">

                <img
                src={{ asset($blog->thumbnail? "storage/$blog->thumbnail" : "images/logo.png") }}
                class="card-img-top my-4"
                alt="..."
            />

            <form action="/blogs/{{ $blog->slug }}/subscription" method="post">
                @csrf
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

            <p class="lh-md">{!! $blog->body !!}</p>
            </div>
        </div>
    </div>

    <x-comments :blog="$blog"
                :comments="$blog->comments()->latest()->paginate(3)" />

    <x-suggest-blogs :blogs="$randomBlogs" />

</x-layout>





