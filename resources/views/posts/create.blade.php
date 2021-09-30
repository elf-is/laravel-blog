<x-layout>
    <section class="px-6 py-8 mx-auto">
        <x-box class="max-w-md mx-auto">
            <h1 class="text-center font-bold text-xl">Post Creation</h1>
            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-5">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="text"
                           name="title"
                           id="title"
                           value="{{old('title')}}"
                           required>
                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Thumbnail
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required>
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full rounded"
                              name="excerpt"
                              id="excerpt"
                              required>{{old('excerpt')}}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full rounded"
                              name="body"
                              id="body"
                              required>{{old('body')}}</textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Category
                    </label>
                    <select name="category_id" id="category_id">
                        @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                {{ucwords($category->name)}}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <x-button>Publish</x-button>
            </form>
        </x-box>
    </section>
</x-layout>