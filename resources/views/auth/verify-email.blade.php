@extends('layout')
@section('content')
@include('partials._innerBanner')
<div class="flex justify-center items-center container mx-auto mt-11 px-6">
      <div
        class="bg-white container max-w-md mx-auto p-5 rounded-md shadow-2xl text-gray-700"
      >
      <h1
        class="max-w-md pb-4 text-3xl font-extrabold text-center text-gray-700 md:text-4xl"
      >
       Email Verification
      </h1>

      <p>To visit this page you need to verify your email</p>

        <form method="POST" action="/email/verification-notification">
            @csrf

            <p class="mt-4 text-gray-500">
              Didn' get the verification Email?
            </p>


          <button
            type="submit"
            class="w-full bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded focus:outline-neonGreenLight"
          >Resend Email</button>

        </form>
      </div>
    </div>

@endsection
