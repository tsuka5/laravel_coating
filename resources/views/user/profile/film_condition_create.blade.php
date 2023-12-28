<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Register Experiment Film Condition
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  <section class="text-gray-600 body-font relative">

                      <div class="container px-5 mx-auto">
                          <div class="flex flex-col text-center w-full mb-4 mt-4">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Condition</h4>
                          </div>
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <x-input-error :messages="$errors->all()" class="mb-4"  />
                              <form method="post" action="{{ route('user.store', ['id'=>$id, 'formType'=>'film_condition']) }}">
                                @csrf
  
                                <div class="m-2">
                                <div class="flex flex-wrap">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="casting_amount" class="leading-7 text-sm text-gray-600">Casting amount (ml)</label>
                                      <input type="number" id="casting_amount" name="casting_amount" value="{{ old('casting_amount') }}" step="0.1"placeholder="ex: 20" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="petri_dish_area" class="leading-7 text-sm text-gray-600">Petri Dish Aria (cm^2)</label>
                                        <input type="number" id="petri_dish_area" name="petri_dish_area" value="{{ old('petri_dish_area') }}"placeholder="ex: 24" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="degas_temperature" class="leading-7 text-sm text-gray-600">Degasting Temperature (℃)</label>
                                        <input type="number" id="degas_temperature" name="degas_temperature" value="{{ old('degas_temperature') }}" step="0.01"placeholder="ex: 24.3" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature (℃)</label>
                                        <input type="number" id="drying_temperature" name="drying_temperature" value="{{ old('drying_temperature') }}" placeholder="ex: 60.8" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity (%RH)</label>
                                        <input type="number" id="drying_humidity" name="drying_humidity" value="{{ old('drying_humidity') }}" step="0.1" placeholder="ex: 80" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time (h)</label>
                                        <input type="number" id="drying_time" name="drying_time" value="{{ old('drying_time') }}" step="0.1" placeholder="ex: 24" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
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