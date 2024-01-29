<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Register Your Experiment
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  @if($type === 'experiment')
                  <section class="text-gray-600 body-font relative">
                      <div class="container px-5 mx-auto">
                        <div class="flex flex-col text-center w-full mb-4 mt-4">
                          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Your Experiment data</h4>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <x-input-error :messages="$errors->all()" class="mb-4"  />
                          <form method="post" action="{{ route('user.store', ['formType'=>'experiment']) }}">
                            @csrf
                            <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                  <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full bg-gray-100 bg-opacity-50
                                   rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                    text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">Your Name</label>
                                  <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 
                                  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                   text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div> 
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                  <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
                                  <input type="date" id="date" name="date" value="{{ old('date') }}" required class="w-full bg-gray-100 bg-opacity-50
                                   rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                    text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              
                          </form>
                            <div class="p-2 w-full flex justify-around mt-4">
                              <button type="button" onclick="location.href='{{ route('user.profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                              <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                            </div>
                    </section>

                    @else
                    <section class="text-gray-600 body-font relative">
                      <div class="container px-5 mx-auto">
                        <div class="flex flex-col text-center w-full mb-4 mt-4">
                          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Paper data</h4>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <x-input-error :messages="$errors->all()" class="mb-4"  />
                          <form method="post" action="{{ route('user.store', ['formType'=>'experiment']) }}">
                            @csrf
                            <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                  <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full bg-gray-100 bg-opacity-50
                                   rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                    text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">Author's Name</label>
                                  <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 
                                  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                   text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                  <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
                                  <input type="date" id="date" name="date" value="{{ old('date') }}" required class="w-full bg-gray-100 bg-opacity-50
                                   rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                    text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="paper_name" class="leading-7 text-sm text-gray-600">Paper Name</label>
                                  <input type="text" id="paper_name" name="paper_name" value="{{ old('paper_name') }}" class="w-full bg-gray-100 bg-opacity-50 
                                  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                   text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="paper_url" class="leading-7 text-sm text-gray-600">Paper URL</label>
                                  <input type="text" id="paper_url" name="paper_url" value="{{ old('paper_url') }}" required class="w-full bg-gray-100 bg-opacity-50
                                   rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none
                                    text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                          </form>
                            <div class="p-2 w-full flex justify-around mt-4">
                              <button type="button" onclick="location.href='{{ route('user.profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                              <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                            </div>
                    </section>
                    @endif
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
