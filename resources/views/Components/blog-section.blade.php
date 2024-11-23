@props(['blogs'])

<section class="container text-center" id="blogs">

    <h1 class="display-5 fw-bold mb-4">Blogs</h1>

    <x-category-dropdown />

<form action="" class="my-3">
    <div class="input-group mb-3">
    <input
        name="search"
        type="text"
        value="{{request('search')}}"
        autocomplete="false"
        class="form-control"
        placeholder="Search Blogs..."
    />
    <button
        class="input-group-text bg-primary text-light"
        id="basic-addon2"
        type="submit"
    >
        Search
    </button>
    </div>
</form>

<div class="row">
    @forelse ($blogs as $blog)
        <x-blog-card :blog="$blog"/>
    @empty
        <p class="fw-bold text-center p-3">No Blog Found.</p>
    @endforelse
</div>

</section>
