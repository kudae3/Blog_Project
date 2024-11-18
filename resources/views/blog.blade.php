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
                <btn class="btn btn-primary p-2 mb-2">{{$blog->category->name}}</btn>
                <p>{{$blog->author->name}}</p>
                <p>{{$blog->created_at->diffForHumans()}}</p>
            </div>
            <p class="lh-md">{{$blog->body}}</p>
            </div>
        </div>
    </div>

    <x-subcribe />

    <x-suggest-blogs :blogs="$randomBlogs" />

</x-layout>





