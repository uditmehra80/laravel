<x-layout>
    <section class="max-w-lg mx-auto mt-10">
        <h1 class="text-center font-bold text-xl">REGISTER</h1>
        <form method="POST" action="/register" class="w-full  mt-5">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" 
                        for="name">
                    Name
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                      type="text"
                      name="name"
                      id="name"
                      value="{{ old('name') }}"
                      required
                  >
                </div>
            </div>
            

            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" 
                    for="username">
                  UserName
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                    type="text"
                    name="username"
                    id="username"
                    value="{{ old('username') }}"
                    required
                >
              </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" 
                      for="email">
                    Email
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                      type="email"
                      name="email"
                      id="email"
                      value="{{ old('email') }}"
                      required
                  >
                </div>
              </div>



            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" 
                    for="password">
                  Password
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                    id="password" 
                    type="password" 
                    name="password"
                    placeholder="******************"
                    required
                >
              </div>
            </div>

            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
           @enderror
           @error('username')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
           @enderror
           @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
           @enderror
           @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
           @enderror

          <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
              <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" 
                type="submit">
                Sign Up
              </button>
            </div>
          </div>
        </form>
    </section>
</x-layout>