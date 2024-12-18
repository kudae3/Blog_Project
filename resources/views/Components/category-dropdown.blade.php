@props(['categories', 'currentcategory'])
<div class="">
    <div class="dropdown">

        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{isset($currentcategory) ? $currentcategory->slug : 'Filter By Category'}}
        </button>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item"
                href="/">all</a></li>
          @foreach ($categories as $category)
            <li><a class="dropdown-item"
                href="/?category={{$category->slug}}{{request('search')?'&search='.request('search'):''}}{{request('author')?'&author='.request('author'):''}}"
                >{{$category->name}}</a></li>
          @endforeach
        </ul>
      </div>
</div>
