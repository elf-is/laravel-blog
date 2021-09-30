@props(['category'])
<div class="space-x-2">
    <a href="/?category={{$category->slug}}"
       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">
        {{$category->name}}</a>
</div>