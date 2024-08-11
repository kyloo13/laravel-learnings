<x-layout>
    <h1 class="title mb-16">Latest Post</h1>

    {{-- Displays all the users' post --}}
    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post"/>
        @endforeach
    </div>
<div class="mt-6">
    {{ $posts->links() }}
</div>
</x-layout>
