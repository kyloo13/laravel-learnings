@props(['msg', 'background' => 'bg-green-500'])

<p class="text-sm font-medium text-white px-3 py-1 my-4 mb-2 rounded-md
{{ $background }}">
    {{ $msg }}
</p>
