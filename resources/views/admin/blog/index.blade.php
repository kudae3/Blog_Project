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
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->intro }}</td>
                <td class="d-flex">
                    <button class="btn btn-success me-2">Edit</button>
                    <form action="/admin/blogs/{{ $blog->id }}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="show_confirm btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      {{ $blogs->links() }}
</x-admin-layout>
