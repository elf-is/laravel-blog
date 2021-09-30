<x-layout>
    <section class="px-6 py-8 mx-auto">
        <x-box class="max-w-md mx-auto">
            <h1 class="text-center font-bold text-xl">Post Creation</h1>
            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.textarea name="excerpt"/>
                <x-form.textarea name="body"/>

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