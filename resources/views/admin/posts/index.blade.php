
<x-layouts>
    <x-setting heading="Mange Posts">
        
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if($post->published === 1)
                                            <form action="{{ route('adminUnPublish',$post->slug) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="px-4 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 hover:bg-red-300 text-red-800">
                                                    Un Publish <i class="fa fa-times m-1" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('adminPublish',$post->slug) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="px-4 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 hover:bg-blue-300  text-blue-800">
                                                    Publish <i class="fa fa-check m-1" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if($post->published === 1)
                                            <span class="px-2 inline-flex text-xs leading-5 px-4 py-0.5 font-semibold rounded-full bg-green-100 text-green-800">Done</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 px-4 py-0.5 font-semibold rounded-full bg-gray-100 text-gray-800">Pending</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('postEdit',$post->slug) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('postDelete',$post->slug) }}" class="text-blue-500 hover:text-blue-700">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                        <div class="m-5">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    </x-setting>
</x-layouts>
