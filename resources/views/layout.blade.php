<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>DevJobs</title>
  </head>
  <body class="bg-bgGrey">
    <header class="">
      @include('partials._navbar')
    </header>

    {{-- VIEW OUTPUT --}}
    @yield('content')

    <footer class="bg-neonGreen p-5 mt-9">
      <div class="container mx-auto flex justify-center items-center">
        <p class="text-md text-gray-700">DeveloperJobs. 2024</p>
      </div>
    </footer>

    @vite('resources/js/index.js')

  </body>
</html>
