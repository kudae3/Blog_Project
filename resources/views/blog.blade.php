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
            <h3 class="my-3">{{$blog->title}}</h3>
            <div>
                <a href={{route('category', $blog->category->slug)}}>
                    <btn class="btn btn-primary p-2 mb-2">{{$blog->category->name}}</btn>
                </a>
                <a href={{route('author', $blog->author->username)}}>
                    <p class="fw-bold">{{$blog->author->name}}</p>
                </a>
                <p>{{$blog->created_at->diffForHumans()}}</p>
            </div>
            <p class="lh-md">{{$blog->body}}</p>
            </div>
        </div>
    </div>

    <x-subcribe />

    <x-suggest-blogs :blogs="$randomBlogs" />

</x-layout>





