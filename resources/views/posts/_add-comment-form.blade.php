@auth()
    <x-box>
        <form action="{{route('comment.store',['post'=>$post])}}" method="post">
            @csrf
            <header class="flex items-center space-x-2">
                <img src="https://i.pravatar.cc/40?u={{auth()->id()}}" alt="avatar"
                     class="rounded-full">
                <h2>Want to participate?</h2>
            </header>
            <div class="mt-5">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring-1"
                          rows="5"
                          placeholder="Type your comment here"
                          required></textarea>
                @error('body')
                <span class="text-red-500 text-xs">{{$message}}</span>
                @enderror
            </div>
            <div class="flex -mb-2 mt-4 pt-4 border-t border-gray-200 justify-end">
                <x-button>Post</x-button>
            </div>
        </form>
    </x-box>
@else
    <p class="-mt-5 font-semibold">
        <a href="/register" class="hover:underline">Register</a> Or
        <a href="/login" class="hover:underline">Log in</a> to leave a comment.
    </p>
@endauth