@extends('layout')

@section('content')
@include('partials._innerBanner')
    <h1 class="text-center font-extrabold text-lg text-gray-700 p-2 mt-4">
      Manage Listings:
    </h1>

    <table class="container mx-auto w-full p-6 table-auto rounded-sm mt-8">
      <tbody>
        @unless($listings->isEmpty())
        @foreach($listings as $listing)
        <tr class="border-green-500">
          <td class="px-4 py-4 border-t border-b border-neonGreen text-md">
            <a href="/listings/{{$listing->id}}"> {{$listing->title}} </a>
          </td>
          <td class="px-4 py-4 border-t border-b border-neonGreen text-md">
            <a href="/listings/{{$listing->id}}/edit" class="text-green-500 hover:text-green-700 py-2 rounded-xl">Edit</a></td>
          <td class="px-4 py-4 border-t border-b border-neonGreen text-md">
            <form method="POST" action="/listings/{{$listing->id}}">
              @csrf
              @method('DELETE')
              <button class="text-red-500">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-md">
            <p class="text-center">No Listings Found</p>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>

@endsection
