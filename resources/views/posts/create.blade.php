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
                <x-form.field>
                    <x-form.label name="category"/>
                    <select name="category_id" id="category_id">
                        @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                {{ucwords($category->name)}}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="category"/>
                </x-form.field>
                <x-button class="mt-5">Publish</x-button>
            </form>
        </x-box>
    </section>
</x-layout>