@extends('layout')

@section('content')
@include('partials._innerBanner')

    <h1 class="text-center font-extrabold text-lg text-gray-700 p-2 mt-4">
      Description:
    </h1>

 <!--  Listing  -->
 <section
     id="listing"
     class="flex flex-col container mx-auto p-6"
     >

    <!-- Content -->
    <div class="bg-white container max-w-full mx-auto p-5 grid  md:grid-cols-3 rounded-md shadow-2xl">
        <div id="publisher" class="relative col-span-1 flex md:flex-row justify-center items-center gap-x-4 p-5">
                <img
                        src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('images/react.png')}}"
                        alt=""
                        class="h-10 w-10 rounded-sm bg-gray-50"
                    />
                    <div class="text-sm leading-6 flex flex-col  md:justify-start">
                        <p class="text-xs text-gray-500">Publisher: </p>
                        <p class="font-semibold text-gray-700">
                        <a href="#">
                            {{$listing['company']}}
                        </a>
                        </p>
                        <time datetime="{{ $listing['created_at']->toDateString() }}" class="text-xs text-gray-500">{{ $listing['created_at']->format('M d, Y') }}</time>
                    </div>
        </div>

        <div id="info" class="col-span-2">
            <div class="group relative">
                @if($listing->user_id == auth()->id())
                <!-- Edit and Delete Buttons -->
                <section class="flex flex-col md:flex-row justify-end items-center space-y-2 md:space-y-0 md:space-x-2">
                    <a href="/listings/{{$listing->id}}/edit" class="flex items-center w-full md:w-auto px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>Edit
                    </a>
                    <form method="POST" action="/listings/{{$listing->id}}" class="w-full md:w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>Delete
                        </button>
                    </form>
                </section>
                @else
                    <p></p>
                @endif
                <!-- Job Title and Description -->
                <h3 class="mt-6 text-lg font-extrabold text-gray-700 group-hover:text-gray-500">
                    <a href="#">
                        {{$listing['title']}}
                    </a>
                </h3>
                <p class="mt-3 text-sm leading-5 text-gray-600">
                {{$listing['description']}}
                </p>

                <!-- Salary, Location, and Tags -->
                <div class="flex justify-start items-center gap-x-4 text-xs mt-6">
                    <ul class="font-gray-700">
                        <li class="mb-2"><strong>Salary:</strong> ${{$listing['salary']}}</li>
                        <li class="mb-2"><strong>Location:</strong> {{$listing['location']}}</li>
                        <li class="mb-2 mt-4">
                           <x-listing-tags :tagsDb="$listing['tags']"/>
                        </li>
                    </ul>
                </div>

                <!-- Job Details -->
                <h3 class="text-start font-semibold text-gray-700 mt-6 pt-4">Details</h3>
                <div class="flex flex-col justify-between gap-x-4 text-xs mt-1">
                    <h3 class="text-lg font-semibold mb-2 text-gray-700">Job Requirements</h3>
                    <p>Bachelors degree</p>
                    <h3 class="text-lg font-semibold mt-4 mb-2 text-gray-700">Benefits</h3>
                    <p>401K and Health insurance</p>
                </div>
            </div>
        </div>
    </div>

    <p class="my-5">
        Please upload your resume and relevant attachments to your position. As subject please give the job title you are
    </p>
    <a
        href="mailto:manager@company.com"
        class="block w-full text-center px-5 py-2.5 mt-4 shadow-sm rounded border text-base font-medium text-white bg-gray-500 hover:bg-gray-700"
        >
        Apply Now
    </a>
</section>

@endsection
