<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2 mt-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Create</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
