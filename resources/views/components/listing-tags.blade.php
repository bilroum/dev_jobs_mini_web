@props(['tagsDb'])

@php
    $tags = explode(',', $tagsDb);
@endphp

@if(!empty($tags))
    @foreach ($tags as $tag)
        @php
            $tag= trim($tag)
        @endphp
        <a
            href="/?tag={{$tag}}"
            class="rounded-full bg-neonGreen px-3 py-1.5 mt-5 font-medium text-gray-600 hover:bg-neonGreenLight"
            >{{$tag}}</a>
    @endforeach
    @else
    <span class="text-gray-600">No tags available</span>
@endif
