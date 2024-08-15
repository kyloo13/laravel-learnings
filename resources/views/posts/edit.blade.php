<x-layout>
    <div class="card">
        <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-emerald-500">&larr; Back</a>
        <h2 class="font-bold mb-4">Update your post</h2>
    <form action="{{ route('posts.update', $post) }}" method="post">
        @csrf
        @method('PUT')
        {{-- Title --}}
        <div class="mb-4">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="" class="input" value="{{ $post->title }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body --}}
        <div class="mb-4">
            <label for="body">Post Content</label>
            <textarea type="text" name="body" id="" class="input">{{ $post->body }}</textarea>
            @error('body')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <button class="primary-btn bg-emerald-800 hover:bg-emerald-900">Update</button>
    </form>
</div>
</x-layout>
