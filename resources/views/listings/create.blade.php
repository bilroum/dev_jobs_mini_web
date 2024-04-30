@extends('layout')

@section('content')
@include('partials._innerBanner')


<h1 class="text-center font-extrabold text-lg text-gray-700 p-2 mt-4">
    Create Listings:
</h1>

<div class="flex justify-center items-center container mx-auto mt-11 px-6">
      <div
        class="bg-white container max-w-md mx-auto p-5 rounded-md shadow-2xl text-gray-700">

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
          <h1
            class="max-w-md pb-4 text-3xl font-extrabold text-center text-gray-700 md:text-4xl"
          >
            Post a new Listing
          </h1>
          <div class="mb-4">
            <input
              type="text"
              name="title"
              placeholder="Job title"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
              value="{{old('title')}}"
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
              value="{{old('description')}}"
            ></textarea>
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
              value="{{old('salary')}}"
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
              value="{{old('logo')}}"
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
              value="{{old('company')}}"
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
              value="{{old('location')}}"
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
              value="{{old('email')}}"
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
              value="{{old('tags')}}"
            />
            @error('tags')
                <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <button
            type="submit"
            class="w-full bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded focus:outline-neonGreenLight"
          >
            Add Listing
          </button>
        </form>
      </div>
    </div>


@endsection
