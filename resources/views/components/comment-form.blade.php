@props(['post'])

<div class="flex items-center justify-center mb-4 mx-auto shadow-lg">
    <form action="{{ route('posts.store.comment', $post->slug) }}" method="post"
          class="bg-white max-w-xl p-4 rounded-lg w-full">
        @csrf
        <div class="flex flex-wrap -mx-3 ">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea
                                    class="bg-gray-100 rounded border border-gray-400  @error('body') border-red-400 @enderror leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                    name="body" placeholder="Type Your Comment"></textarea>

                @error('body')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="ml-auto">
                    <input type="submit"
                           class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                           value="Post Comment">
                </div>
            </div>
        </div>
    </form>
</div>
