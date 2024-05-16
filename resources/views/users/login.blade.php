@extends('layout')
@section('content')
@include('partials._innerBanner')

<div class="flex flex-col justify-center items-center container mx-auto mt-11 px-6">
  <x-flash-message />

  <div
  class="bg-white container max-w-md mx-auto p-5 rounded-md shadow-2xl text-gray-700"
  >
        <form method="POST" action="/users/authenticate">
            @csrf
          <h1
            class="max-w-md pb-4 text-3xl font-extrabold text-center text-gray-700 md:text-4xl"
          >
            Login
          </h1>

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
              type="password"
              name="password"
              placeholder="Password"
              class="w-full px-4 py-2 border rounded focus:outline-neonGreenLight"
            />
            @error('password')
            <p class="text-red-500 mt-1">{{$message}}</p>
            @enderror
          </div>

          <button
            type="submit"
            class="w-full bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded focus:outline-neonGreenLight"
          >Login</button>

          <p class="mt-4 text-gray-500">
            Don't have an account?
            <a class="text-gray-700 hover:text-neonGreen" href="/register"
              >Register</a
            >
          </p>

          <p class="mt-4 text-gray-500">
            Forgot password? You can Reset it.
            <a class="text-gray-700 hover:text-neonGreen" href="/forgot-password"
              >Reset Password</a
            >
          </p>
          <p class="mt-4 text-gray-500">
            Sign in with google?
            <a class="text-gray-700 hover:text-neonGreen" href="/auth/google/redirect"
              >Google Signin</a
            >
          </p>
        </form>
      </div>
    </div>

@endsection
