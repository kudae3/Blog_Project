<x-layout>
    <div class="col-md-8 mx-auto">

        <x-comment-wrapper>

            <h5 class="text-center">Create a new Blog 📰🗽 </h5>

            <form action="/blogs/admin/store" method="post" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title"/>
                <x-form.input name="intro"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.text-area name="body"/>


                <x-form.input-wrapper>
                    <x-form.label name="category"/>
                    <select id="category" class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-error-msg name="category_id" />
                </x-form.input-wrapper>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </x-comment-wrapper>
    </div>
</x-layout>
