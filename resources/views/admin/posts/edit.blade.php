<x-layout>
    <x-setting :heading="'Edit Post: ' .$post->title">
        <form action="{{route('post_update',['post'=>$post])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('title',$post->title)"/>
            <div class="flex mt-5">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail)"/>
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog post illustration"
                     class="rounded-xl ml-4 w-1/4">
            </div>
            <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>
            <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>
            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category_id">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{$category->id}}" {{old('category_id',$post->category_id) == $category->id ? 'selected' : ''}}>
                            {{ucwords($category->name)}}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </x-form.field>
            <x-button class="mt-5">Update</x-button>
        </form>
    </x-setting>
</x-layout>