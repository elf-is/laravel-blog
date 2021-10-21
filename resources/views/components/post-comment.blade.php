@props(['comment','post'])
<x-box class="bg-gray-50">
    <article class="flex space-x-3 rounded-xl">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->author->id}}" alt="avatar" class="rounded-xl">
        </div>
        <div x-data="{edit:false,open: false}" class="w-full">
            <header class="mb-2 ">
                <div class="flex justify-between">
                    <h3 class="font-bold">
                        <a href="/?author={{$comment->author->username}}"
                           class="font-bold">{{$comment->author->name}}</a>
                    </h3>

                    @can('modify_comment',$comment)
                        <div class="flex justify-end space-x-1">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300
                                         focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div class="ml-1">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M6 12a2 2 0 11-4 0 2 2 0 014 0zm8 0a2 2 0 11-4 0 2 2 0 014 0zm6 2a2 2 0 100-4 2 2 0 000 4z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link @click="{edit = !edit}" style="cursor:pointer">
                                        Edit
                                    </x-dropdown-link>

                                    <form action="{{route('comment.destroy',['post'=>$post,'comment' => $comment])}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-dropdown-link
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();" style="cursor:pointer">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endcan
                </div>
                <div>
                    @if($comment->created_at != $comment->updated_at)
                        <span class="text-gray-400 block text-xs">
                    Updated <time>{{$comment->updated_at->diffForHumans()}}</time>
                    </span>
                    @else
                        <span class="text-gray-400 block text-xs">
                    Published <time>{{$comment->created_at->diffForHumans()}}</time>
                    </span>
                    @endif
                </div>
            </header>
            <p>
                {{$comment->body}}
            </p>
            @can('modify_comment',$comment)
                <div x-show="edit">
                    <form action="{{route('comment.update',['post'=>$post,'comment' => $comment])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <textarea name="body"
                                  class="mt-2 w-full bg-gray-50 text-sm focus:outline-none focus:ring-1"
                                  rows="5"
                                  placeholder="Type your comment here"
                                  required></textarea>
                        @error('body')
                        <span class="text-red-500 text-xs">{{$message}}</span>
                        @enderror
                        <div class="flex -mb-2 mt-4 pt-4 border-t border-gray-200 justify-end">
                            <x-button type="submit">Update</x-button>
                        </div>
                    </form>
                </div>
            @endcan
        </div>
    </article>
</x-box>