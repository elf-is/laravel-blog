@props(['post'])
<article
        {{$attributes->merge([
            'class'=>'transition-colors duration-400 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-30 rounded-xl'
            ])}}>
    <div class="px-5 py-6 space-y-4">
        <div class="flex-1">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog post illustration" class="rounded-xl">
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header>
                <x-category-button :category="$post->category"/>
                <div>
                    <h1 class="text-3xl pt-5"><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h1>
                    <span class="mt-2 text-gray-400 block text-xs">
                                     Published <time>{{$post->created_at->diffForHumans()}}</time>
                                </span>
                </div>
            </header>
            <div class="space-y-4">
                {!!$post->excerpt!!}
            </div>
            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/60?u={{$post->author->id}}" alt="author" class="rounded-xl">
                    <div class="ml-3">
                        <a href="/?author={{$post->author->username}}" class="font-bold">{{$post->author->name}}</a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <a href="/posts/{{$post->slug}}" class="text-xs font-semibold bg-gray-200 rounded-full py-2 px-4">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
