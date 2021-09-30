<x-layout>
    <section class="px-6 py-8 mx-auto">
        <main class="max-w-4xl mx-auto mt-4 sm:mt-20 space-y-8 mx-6">
            <article
                    class="pt-12 px-2 lg:grid lg:grid-cols-12 gap-x-10 rounded-xl">
                <div class="flex-1 lg:mr-8 col-span-4 text-center space-y-4">
                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="Blog post illustration" class="rounded-xl">
                    <div class="flex items-center text-sm justify-center">
                        <img src="/images/lary-avatar.svg" alt="Lary">
                        <div class="ml-3">
                            <a href="/?author={{$post->author->username}}" class="font-bold">{{$post->author->name}}</a>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl col-span-8 mb-6">
                    <div class="lg:flex">
                        <div class="flex-1 flex flex-col justify-between">
                            <header class="lg:-mt-10 mt-5">
                                <div class="flex justify-between">
                                    <x-return/>
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
                            <div class="space-y-4 text-lg">
                                {!!  $post->body !!}
                            </div>
                        </div>
                    </div>
                </div>

                <section class="col-span-8 col-start-5 mt-8 space-y-3">
                    @include('posts._add-comment-form')
                    @if($post->comments->count() >= 1)
                        @foreach($post->comments as $comment)
                            <x-post-comment :comment="$comment" :post="$post"/>
                        @endforeach
                    @endif
                </section>

            </article>
        </main>
    </section>
</x-layout>
