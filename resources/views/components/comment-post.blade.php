@props(['post', 'comment'])

<div
    class=" grid grid-cols-1 gap-3 p-4 border rounded-lg bg-white shadow-lg w-full">
    <div class="flex gap-4">
        <img
            src="{{ $comment->user->image }}"
            class=" rounded-lg  -mb-4 bg-white max-h-full w-20" alt=""
            loading="lazy">
        <div class="flex flex-col justify-center w-full">
            <div class="flex flex-row justify-between">
                <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ $comment->user->name }}</p>
                <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
            </div>
            <p class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <p class="text-gray-500">{{ $comment->body }}</p>
</div>

