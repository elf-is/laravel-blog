<x-layout>
    <x-setting heading="Manage Posts">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="{{route('show_post',['post'=>$post])}}">
                                                    {{$post->title}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold
                                        rounded-full bg-green-100 text-green-800">
                                          Published
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('post_edit',['post'=>$post])}}"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td x-data="{showDeleteModal:false}"
                                        x-bind:class="{ 'model-open': showDeleteModal }"
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button @click={showDeleteModal=true}
                                                class="inline text-red-500 hover:text-red-600">
                                            Delete
                                        </button>
                                        <div x-show="showDeleteModal" tabindex="0"
                                             class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                            <div @click.away="showDeleteModal = false"
                                                 class="z-50 relative p-3 mx-auto my-0 max-w-full"
                                                 style="width: 500px;">
                                                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden px-10 py-10">
                                                    <div class="text-center">
                                                    </div>
                                                    <div class="text-center py-6 text-2xl text-gray-700">Confirm delete
                                                        ?
                                                    </div>
                                                    <div class="text-center font-light text-gray-700 mb-8">
                                                        <p>This process cannot
                                                            be undone.</p>
                                                    </div>
                                                    <div class="flex justify-center">
                                                        <button @click={showDeleteModal=false}
                                                                class="bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">
                                                            Cancel
                                                        </button>
                                                        <form action="{{route('post_delete',['post'=>$post])}}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                    class="bg-red-500 text-gray-200 rounded hover:bg-red-400 px-6 py-2 focus:outline-none mx-1"
                                                                    type="submit">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>