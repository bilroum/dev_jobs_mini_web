@extends('layout')

@section('content')
@include('partials._innerBanner')


<div class="flex justify-center items-center container mx-auto mt-11 px-6">
      <div
        class="bg-white container max-w-md mx-auto p-5 rounded-md shadow-2xl text-gray-700">

        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <h1
            class="max-w-md pb-4 text-3xl font-extrabold text-center text-gray-700 md:text-4xl"
          >
            Edit Listing
          </h1>
          <div class="mb-4">
            <input
              type="text"
              name="title"
              placeholder="Job title"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{$listing->title}}"
            />
            @error('title')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-4">
            <textarea
              name="description"
              placeholder="Job Description"
              class="w-full px-4 py-2 border rounded focus:outline--neonGreenLight"
            >{{$listing->description}}</textarea>
            @error('description')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-4">
            <input
              type="text"
              name="salary"
              placeholder="Salary"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{$listing->salary}}"
            />
            @error('salary')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-4">
            <input
              type="file"
              name="logo"
              placeholder="Company Logo"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{$listing->logo}}"
            />

            <img
                src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('images/react.png')}}"
                alt=""
                class="h-10 w-10 rounded-sm bg-gray-50"
                    />
            @error('logo')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-4">
            <input
              type="text"
              name="company"
              placeholder="Company Name"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{$listing->company}}"
            />
            @error('company')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-4">
            <input
              type="text"
              name="location"
              placeholder="Location"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{$listing->location}}"
            />
            @error('location')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-4">
            <input
              type="email"
              name="email"
              placeholder="Email Address"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{$listing->email}}"
            />
            @error('email')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-4">
            <input
              type="text"
              name="tags"
              placeholder="Tags separed by , (komma)"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{$listing->tags}}"
            />
            @error('tags')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <button
            type="submit"
            class="w-full bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded focus:outline-neonGreenLight"
          >
            Update Listing
          </button>
        </form>
      </div>
    </div>


@endsection
