<select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold"
        id="selectAuthor" name="author">
    <option value="category" disabled selected>Author</option>

    @foreach($users as $user)
        <option
            value="{{ $user->username }}" class="capitalize"
            {{ $user->username == request()->author ? 'selected' : '' }}
        >
            {{ $user->name }}
        </option>
    @endforeach
</select>
