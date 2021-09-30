<header class="mx-auto max-w-xl mt-10 text-center">
    <h1 class="text-4xl">Latest <span class="text-blue-500">Laravel From Scratch</span> News</h1>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:inline-flex bg-gray-200 rounded-full">
            <x-category.dropdown-container/>
        </div>

        <div class="relative flex lg:inline-flex bg-gray-200 rounded-full py-2 px-3">
            <form method="GET" action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
