<x-layout>
    <h1 class="text-4xl">Hello {{ auth()->user()->username ?? '' }}</h1>

    {{-- Create Post Form --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        {{-- Session Messages --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (@session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" background="bg-red-500" />
        @endif

        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            {{-- Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="" class="input" value="{{ old('title') }}">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea type="text" name="body" id="" class="input">{{ old('body') }}</textarea>
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <button class="primary-btn">Post</button>
        </form>
    </div>


    {{-- Users Previous Post --}}
    <div class="card">
        <h2 class="font-bold mb-4">Your Latests Posts</h2>
        <div class="grid grid-cols-2 gap-6">
            @foreach ($posts as $post)
                <x-postCard :post="$post">
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-2 text-xs rounded-md mt-4">Delete</button>
                    </form>
                </x-postCard>
            @endforeach
        </div>
    </div>
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>
