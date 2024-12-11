<x-admin-layout>
    <x-comment-wrapper>

        <h5 class="text-center">Edit Blog 📝</h5>

        <form action="/admin/blogs/{{ $blog->slug }}/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <x-form.input name="title" value="{{ $blog->title }}"/>
            <x-form.input name="intro" value="{{ $blog->intro }}"/>
            <x-form.input name="slug" value="{{ $blog->slug }}"/>

            <x-form.input name="thumbnail" type="file"/>
            @if ($blog->thumbnail)
                <div class="d-flex flex-column align-items-start mb-4">
                    <img src={{ asset("storage/$blog->thumbnail") }} alt="" class="mb-2" width="100" height="100">
                </div>
            @endif


            <x-form.text-area name="body" value="{{ $blog->body }}"/>


            <x-form.input-wrapper>
                <x-form.label name="category"/>
                <select id="category" class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option {{ $category->id == old('category_id', $blog->category_id) ? 'selected' : '' }} value="{{ $category->id }}" >{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-error-msg name="category_id" />
            </x-form.input-wrapper>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </x-comment-wrapper>
</x-admin-layout>
