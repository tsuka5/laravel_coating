<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Register Experiment Stroing Test
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  <section class="text-gray-600 body-font relative">

                      <div class="container px-5 mx-auto">
                          <div class="flex flex-col text-center w-full mb-4 mt-4">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                          </div>
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <x-input-error :messages="$errors->all()" class="mb-4"  />
                              <form method="post" action="{{ route('user.store', ['id'=>$id, 'formType'=>'storing_test']) }}">
                                @csrf
  
                                <div class="m-2">
                                <div class="flex flex-wrap">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="s_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                        <input type="text" id="s_name" name="s_name" value="{{ old('s_name') }}" placeholder="Enter name of fruits or vegtables. (ex: strawberry)" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="storing_days" class="leading-7 text-sm text-gray-600">Storing days  (days)</label>
                                        <input type="number" id="storing_days" name="storing_days" value="{{ old('storing_days') }}" placeholder="Enter storing days. (ex: 15)" step="0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate (%)</label>
                                        <input type="number" id="mass_loss_rate" name="mass_loss_rate" value="{{ old('mass_loss_rate') }}"placeholder="Enter mass loss late. (ex: 3)" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="color_l" class="leading-7 text-sm text-gray-600">L*</label>
                                        <input type="number" id="color_l" name="color_l" value="{{ old('color_l') }}" step=0.1 placeholder="Enter L* value. (ex: 28.6)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="color_a" class="leading-7 text-sm text-gray-600">a*</label>
                                        <input type="number" id="color_a" name="color_a" value="{{ old('color_a') }}" step="0.1" placeholder="Enter a* value. (ex: 34.1)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="color_b" class="leading-7 text-sm text-gray-600">b*</label>
                                      <input type="number" id="color_b" name="color_b" value="{{ old('color_b') }}" step="0.1" placeholder="Enter b* value. (ex: 19.0)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="color_e" class="leading-7 text-sm text-gray-600">⊿E</label>
                                        <input type="number" id="color_e" name="color_e" value="{{ old('color_e') }}" step="0.1" placeholder="Enter ⊿E value. (ex: 29.1) " class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                                        <input type="number" id="ph" name="ph" value="{{ old('ph') }}" step="0.1" placeholder="Enter pH value. (ex: 6.5)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                                      <input type="number" id="tss" name="tss" value="{{ old('tss') }}" step="0.1" placeholder="Enter TSS value. (ex: 8.8)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness (N)</label>
                                      <input type="number" id="hardness" name="hardness" value="{{ old('hardness') }}" step="0.01" placeholder="Enter hardness value. (ex: 0.10)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content (%)</label>
                                          <input type="number" id="moisture_content" name="moisture_content" step="0.1" placeholder="Enter MC value. (ex: 40)" value="{{ old('moisture_content') }}" step="0.01" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                 
                             <div class="p-2 w-full flex justify-around mt-4">
                              <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                              <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                             </div>
                            </form>
                          </div>
                          </div>
                  </section>
              </div>
          </div>
      </div>
  </div>

</x-app-layout>