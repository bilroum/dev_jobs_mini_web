<!-- Hero -->
<section
      id="hero"
      class="bgImage relative w-full bg-cover bg-center bg-no-repeat flex items-center"
    >
      <div class="overlay"></div>

      <!-- Flex Container -->
      <div class="mx-auto px-6 mt-10 md:pt-10 md:pb-20 z-10">
        <h1
          class="max-w-md text-2xl font-extrabold text-center text-gray-700 mb-3 md:text-4xl"
        >
          Find your Dream Job!
        </h1>
        <p class="hidden md:max-w-md mb-3 text-center text-white">
          Here you can find your dream job as Developer. For Companies you can
          log in and post a Job! Scroll down to see recent jobs or search for a
          keyword.
        </p>

        <form class="md:flex md:justify-center mb-4 md:mx-auto md:space-x-2">
          <input
            type="text"
            name="keywords"
            placeholder="Keywords"
            class="w-full md:w-auto text-center md:text-start mb-2 px-4 py-2 focus:outline-none"
          />
          <input
            type="text"
            name="location"
            placeholder="Location"
            class="w-full md:w-auto text-center md:text-start mb-2 px-4 py-2 focus:outline-none"
          />
          <button
            class="w-full md:w-auto flex justify-center items-center space-x-0.5 bg-neonGreen hover:bg-neonGreenLight text-white mb-2 px-4 py-2 focus:bg-neonGreen"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-4 h-4"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
              />
            </svg>
            <span>Search</span>
          </button>
        </form>
      </div>
    </section>
