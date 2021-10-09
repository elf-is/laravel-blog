@props(['comment','post'])
<x-box class="bg-gray-50">
    <article class="flex space-x-3 rounded-xl">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->author->id}}" alt="avatar" class="rounded-xl">
        </div>
        <div x-data="{show:false}" class="w-full">
            <header class="mb-2 ">
                <div class="flex justify-between">
                    <h3 class="font-bold">
                        <a href="/?author={{$comment->author->username}}"
                           class="font-bold">{{$comment->author->name}}</a>
                    </h3>

                    @can('modify',$comment)
                        <div class="flex justify-end space-x-1">
                            <div>
                                <x-button @click="{show= !show}">
                                    Edit
                                </x-button>
                            </div>
                            <form action="/posts/{{$post->slug}}/comments/delete/{{$comment->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit">Delete</x-button>
                            </form>
                        </div>
                    @endcan
                </div>
                @if($comment->created_at != $comment->updated_at)
                    <span class="text-gray-400 block text-xs">
                    Updated <time>{{$comment->updated_at->diffForHumans()}}</time>
                    </span>
                @else
                    <span class="text-gray-400 block text-xs">
                    Published <time>{{$comment->created_at->diffForHumans()}}</time>
                    </span>
                @endif

            </header>
            <p>
                {{$comment->body}}
            </p>
            <div x-show="show">
                <form action="/posts/{{$post->slug}}/comments/edit/{{$comment->id}}" method="post">
                    @csrf
                    @method('PATCH')
                    <textarea name="body"
                              class="mt-2 w-full bg-gray-50 text-sm focus:outline-none focus:ring-1"
                              rows="5"
                              placeholder="Type your text here"
                              required></textarea>
                    @error('body')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
                    <div class="flex -mb-2 mt-4 pt-4 border-t border-gray-200 justify-end">
                        <x-button type="submit">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </article>
</x-box>