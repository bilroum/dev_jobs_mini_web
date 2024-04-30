@extends('layout')

@section('content')
@include('partials._hero')


    <h1 class="text-center font-extrabold text-lg text-gray-700 p-2 mt-4">
      Recent Listings:
    </h1>

    <x-flash-message />
@unless(count($listings) ==0)


<section
id="listings"
class="grid sm:grid-rows-1 md:grid-cols-3 gap-4 container mx-auto px-6"
>
    @foreach($listings as $listing)
        <x-listing-card :listing="$listing"/>
    @endforeach

</section>
<div class="flex justify-center px-6 mt-10">
    {{$listings->links()}}
</div>
@else
    <p class="container mx-auto">No Listings found</p>
@endunless
@endsection
