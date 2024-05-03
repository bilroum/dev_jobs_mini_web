@extends('layout')
@section('content')
@include('partials._innerBanner')
<div class="flex justify-center items-center container mx-auto mt-11 px-6">
      <div
        class="bg-white container max-w-md mx-auto p-5 rounded-md shadow-2xl text-gray-700"
      >
        <form>
            @csrf
          <h1
            class="max-w-md pb-4 text-3xl font-extrabold text-center text-gray-700 md:text-4xl"
          >
            Password reset confirmation
          </h1>

          <p class="mt-4 text-gray-700">
            Please confirm the reset link we send you to log in.
          </p>


        </form>
      </div>
    </div>

@endsection
