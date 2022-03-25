<select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold"
        id="selectCategory" name="category">
    <option value="category" disabled selected>Categories</option>

    @foreach($categories as $category)
        <option
            value="{{ $category->slug }}" class="capitalize"
            {{ $category->slug == request()->category ? 'selected' : '' }}
        >
            {{ $category->name }}
        </option>
    @endforeach
</select>
