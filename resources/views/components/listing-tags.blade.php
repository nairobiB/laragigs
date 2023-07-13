@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
    @foreach($tags as $tag)
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
        <!-- the href will appear in the browser as something requested, whatever tag we click will be the one that was requested -->
    </li>
    @endforeach

</ul>