<x-dropdown>
    <x-slot name="trigger">
        <button
                class="flex sm:inline-flex py-2 pr-9 pl-3 text-sm font-semibold w-full sm:w-32 text-left">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="/?{{http_build_query(request()->except('category','page'))}}"
                     :active="request('category')=== null">All</x-dropdown-item>
    {{-- The :active parameter sets the currently active link--}}
    {{-- The ->is() is equivalent to comparing ids--}}
    @foreach($categories as $category)
        <x-dropdown-item
                href="/?category={{$category->slug}}&{{http_build_query(request()->except('category','page'))}}"
                {{--  :active="isset($currentCategory) && $currentCategory->is($category)"--}}
                {{--  Another way to do it--}}
                :active="request('category') === $category->slug"
        >
            {{ucwords($category->name)}}</x-dropdown-item>
    @endforeach
</x-dropdown>