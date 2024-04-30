@props(['listing'])
<!-- listing -->
<x-card>
    <div class="relative flex items-center gap-x-4">
            <img
                src="{{$listing->logo ? asset('storage/'. $listing->logo) : asset('/images/react.png')}}"
                alt=""
                class="h-10 w-10 rounded-full bg-gray-50"
            />
            <div class="text-sm leading-6 flex flex-col justify-start">
                <p class="font-semibold text-gray-700">
                <a href="#">
                    {{$listing['company']}}
                </a>
                </p>
                <time datetime="{{ $listing['created_at']->toDateString() }}" class="text-xs text-gray-500">{{ $listing['created_at']->format('M d, Y') }}</time>
            </div>
            </div>

            <div class="group relative">
            <h3
                class="mt-6 text-lg font-extrabold text-gray-700 group-hover:text-gray-500"
            >
                <a href="/listings/{{$listing['id']}}">
                {{$listing['title']}}
                </a>
            </h3>
            <p class="mt-3 line-clamp-3 text-sm leading-5 text-gray-600">
            {{$listing['description']}}
            </p>
            </div>

            <div class="flex justify-start items-center gap-x-4 text-xs mt-6">
            <ul class="font-gray-700">
                <li class="mb-2"><strong>Salary:</strong> ${{$listing['salary']}}</li>
                <li class="mb-2"><strong>Location:</strong> {{$listing['location']}}</li>
                <li class="mb-2 mt-4">
                    <x-listing-tags :tagsDb="$listing['tags']"/>
                </li>
            </ul>
            </div>

            <a
            href="/listings/{{$listing['id']}}"
            class="block w-full text-center px-5 py-2.5 mt-4 shadow-sm rounded border text-base font-medium text-white bg-gray-500 hover:bg-gray-700"
            >
            Details
            </a>
        </div>
</x-card>
