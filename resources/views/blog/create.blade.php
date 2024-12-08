<x-layout>
    <div class="col-md-8 mx-auto">

        <x-comment-wrapper>

            <h5 class="text-center">Create a new Blog 📰🗽 </h5>

            <form action="/blogs/admin/store" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value={{old('title')}}>
                    <x-error-msg name="title" />
                </div>

                <div class="mb-3">
                    <label for="intro" class="form-label">Intro</label>
                    <input name="intro" type="text" class="form-control" id="intro" value={{old('intro')}}>
                    <x-error-msg name="intro" />
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input name="slug" type="text" class="form-control" id="slug" value={{old('slug')}}>
                    <x-error-msg name="slug" />
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Photo</label>
                    <input type="file" name="thumbnail" id="" class="form-control">
                    <x-error-msg name="thumbnail" />
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" class="form-control" rows="5">{{old('body')}}</textarea>
                    <x-error-msg name="body" />
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-error-msg name="category_id" />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </x-comment-wrapper>
    </div>
</x-layout>
