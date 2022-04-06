@extends('layouts.frontend')

@section('content')
    <div
        class="mt-16 flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500">
        <div class="bg-white border-2 border-gray-200 max-w-lg mx-auto px-10 py-8 rounded-lg shadow-xl w-full">
            <div class="max-w-md mx-auto space-y-6">

                <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <h2 class="text-3xl font-bold text-center">edit post</h2>
                    <hr class="my-6">

                    <div class="mb-3">
                        <label for="image" class="text-sm font-bold opacity-70">image</label>
                        <input type="file" name="image" id="image"
                               class="p-3 mt-2 mb-1 w-full rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none @error('image') border-red-300 @enderror">

                        @error('image')
                        <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" id="previewHolder"
                             style="width: 350px;height: 250px;margin: auto;border-radius: 20px;">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="text-sm font-bold opacity-70">title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                               placeholder="Enter the title"
                               class="p-3 mt-2 mb-1 w-full rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none @error('title') border-red-300 @enderror">

                        @error('title')
                        <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="text-sm font-bold opacity-70">slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}"
                               placeholder="Enter the slug"
                               class="p-3 mt-2 mb-1 w-full rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none @error('slug') border-red-300 @enderror">

                        @error('slug')
                        <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="text-sm font-bold opacity-70">body</label>

                        <textarea name="body" id="body" cols="30" rows="3" placeholder="Enter the body"
                                  class="p-3 mt-2 mb-1 w-full rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none @error('body') border-red-300 @enderror">{{ old('body', $post->body) }}</textarea>


                        @error('body')
                        <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="text-sm font-bold opacity-70">category</label>

                        <select name="category_id" id="category_id"
                                class="w-full p-3 mt-2 mb-1 w-full rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none @error('category_id') border-red-300 @enderror">
                            <option selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ $post->category_id == $category->id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>


                        @error('category_id')
                        <span class="text-red-300">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <input type="submit"
                               class="py-3 px-6 my-2 bg-blue-500 text-white font-medium rounded cursor-pointer ease-in-out duration-300"
                               value="Save Data">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewHolder').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                alert('select a file to see preview');
                $('#previewHolder').attr('src', '');
            }
        }

        $("#image").change(function () {
            readURL(this);
        });
    </script>
@endsection
