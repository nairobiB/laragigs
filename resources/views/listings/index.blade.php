<!-- to use the layout we made, we extend it and create a section named content and everything will be wrapped inside of section-endsection -->
<!-- another way of doing this easier is moving layout to the components folder, turning it into a component and wrapping our pages in this component -->
{{-- @extends('layout') --}}

{{-- @section('content') comment this and remove section, wrap everything in the new component we made that is called layout --}}


<x-layout>
    @include('partials._hero')
    @include('partials._search')
    <!-- Partials are segments or pieces of a page that can be added individually in what pages need it -->

    @if (count($listings)==0)
    <p>No listings found</p>
    @endif
    
    @foreach ($listings as $listing)

    <x-listing-card :listing="$listing" />

    @endforeach
    <div class="mt-6 p-4">
    {{$listings->links()}}
    <!-- this ^ will help with the pagination, makes the buttons and shows the amount of results, the pagination was done in the listing controller -->
    </div>
</x-layout>
{{-- @endsection --}}