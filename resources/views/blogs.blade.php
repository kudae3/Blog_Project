<x-layout>
    <x-hero />
    <x-blog-section
        :blogs="$blogs"
        :categories="$categories"
        :currentcategory="$currentcategory??null"
    />
    <x-subcribe />
</x-layout>


