@props(['post'])
<article
        class="transition-colors duration-400 hover:bg-gray-100  border border-black border-opacity-0 hover:border-opacity-30 rounded-xl">
    <div class="px-5 py-6 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog post illustration" class="rounded-xl">
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category"/>
                </div>
                <div>
                    <h1 class="text-3xl pt-5">
                        <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                    </h1>
                    <span class="mt-2 text-gray-400 block text-xs">
                                    Published <time>{{$post->created_at->diffForHumans()}}</time>
                                </span>
                </div>
            </header>
            <div class="space-y-4">
                {!! $post->excerpt!!}
            </div>
            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary">
                    <div class="ml-3">
                        <a href="/?author={{$post->author->username}}" class="font-bold">{{$post->author->name}}</a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <a href="/posts/{{$post->slug}}" class="text-xs font-semibold bg-gray-200 rounded-full py-2 px-8">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
