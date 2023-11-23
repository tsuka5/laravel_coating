<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Register Experiment Material
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  <section class="text-gray-600 body-font relative">

                      <div class="container px-5 mx-auto">
                          <div class="flex flex-col text-center w-full mb-4 mt-4">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Material</h4>
                          </div>
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <x-input-error :messages="$errors->all()" class="mb-4"  />
                            <form method="post" action="{{ route('user.store', ['id'=>$id, 'formType'=>'material']) }}">
                              @csrf

                              <div class="m-2">
                              <div class="flex flex-wrap">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="m_name" class="leading-7 text-sm text-gray-600">Name</label>
                                    <input type="text" id="title" name="m_name" value="{{ old('m_name') }}" placeholder="Enter material name.(ex: starch)" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="price" class="leading-7 text-sm text-gray-600">Price (yen/kg)</label>
                                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Enter price of material.(ex: 1000)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative"> 
                                    <label for="heat" class="leading-7 text-sm text-gray-600">Heat (Yes or No)</label>
                                    <input type="number" id="heat" name="heat" value="{{ old('heat') }}"placeholder="Enter with or without heating. (ex:Yes)"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="water_temperature" class="leading-7 text-sm text-gray-600">Water Temperature (℃)</label>
                                    <input type="number" id="water_temperature" name="water_temperature"placeholder="Enter water temperature. (ex: 80)" value="{{ old('water_temperature') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="starler_speed" class="leading-7 text-sm text-gray-600">Starler Speed (rpm)</label>
                                    <input type="number" id="starler_speed" name="starler_speed" value="{{ old('starler_speed') }}" placeholder="Enter staler speed.(ex: 800)"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="repeat" class="leading-7 text-sm text-gray-600">Rpeat (times)</label>
                                    <input type="number" id="repeat" name="repeat" value="{{ old('repeat') }}" placeholder="Enter repeat times. (ex: 3)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="staler_time" class="leading-7 text-sm text-gray-600">Staler Time (min)</label>
                                    <input type="number" id="staler_time" name="staler_time" value="{{ old('staler_time') }}" placeholder="Enter staler time. (120)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">ph Adjustment (Yes or No)</label>
                                    <input type="number" id="ph_adjustment" name="ph_adjustment" value="{{ old('ph_adjustment') }}" placeholder="Enter with or without pH adjustment. (ex: Yes)" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ph_material" class="leading-7 text-sm text-gray-600">ph Material</label>
                                    <input type="number" id="ph_material" name="ph_material" value="{{ old('ph_material') }}" placeholder="Enter material for pH adjustment. (ex:citric acid)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ph_target" class="leading-7 text-sm text-gray-600">ph target</label>
                                    <input type="number" id="ph_target" name="ph_target" value="{{ old('ph_target') }}" step="0.1" placeholder="Enter pH target. (ex:6.0)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                              
                                <div class="p-2 w-full flex justify-around mt-4">
                                  <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                  <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                              </div>
                            </form>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
      </div>
  </div>

</x-app-layout>