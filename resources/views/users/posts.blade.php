<x-layout>

    <h1 class="title mb-16">
        {{ $user->username }}'s Post: {{ $posts->total() }}
    </h1>

    {{-- User's posts --}}
    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    {{-- Pagination --}}
    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
