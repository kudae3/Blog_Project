<x-admin-layout>
    <h4 class="text-center pb-3">Blogs</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col" class="text-center">Title</th>
            <th scope="col" class="text-center">Intro</th>
            <th scope="col" class="text-center" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <td class="text-center"><a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a></td>

                <td class="text-center">{{ $blog->intro }}</td>

                @if (Gate::allows('access-post', $blog))
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-success me-2" href="/admin/blogs/{{ $blog->slug }}/edit">Edit</a>

                        <form action="/admin/blogs/{{ $blog->id }}/delete" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="show_confirm btn btn-danger">Delete</button>
                        </form>
                    </td>
                @else
                    <td></td>
                @endif


              </tr>
            @endforeach
        </tbody>
      </table>
      {{ $blogs->links() }}
</x-admin-layout>
