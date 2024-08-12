@props(['post', 'full' => false])

<div class="p-3 border-2 border-gray-200 rounded-md">
    {{-- Title --}}
    <h2 class="font-bold text-xl">Title: {{ $post->title }}</h2>

    {{-- Author and Date --}}
    <div class="text-xs font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans() }} </span>
        <a href="{{ route('posts.user', $post->user) }}"
        class="text-blue-500 font-medium">
        {{
        $post->user->username
        }}</a>
    </div>

    {{-- Body --}}
    <div class="text-sm">
    @if ($full)
    <p>{{ ($post->body) }}</p>
    @else
    <p class="mb-3">{{ Str::words($post->body, 15) }}</p>
    <a href="{{ route('posts.show', $post) }}" class="bg-slate-200 py-1 px-2 rounded-xl text-blue-500">Read more &rarr;</a>
    @endif
    </div>
    <div class="flex items-center justify-end gap-4">
        {{ $slot }}
    </div>
</div>
