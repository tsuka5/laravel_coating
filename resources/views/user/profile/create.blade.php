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

                    <section class="text-gray-600 body-font relative">


                        <div class="container px-5 mx-auto">
                          <div class="flex flex-col text-center w-full mb-12">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Experiment</h4>
                          </div>
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <x-input-error :messages="$errors->all()" class="mb-4"  />
                            <form method="post" action="{{ route('user.profile.store') }}">
                              @csrf
                              <div class="m-2">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative"> 
                                    <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
                                    <input type="date" id="date" name="date" value="{{ old('date') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="paper" class="leading-7 text-sm text-gray-600">Paper</label>
                                      <input type="text" id="paper" name="paper" value="{{ old('paper') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                        


                                 {{-- <div class="container px-5 mx-auto"> --}}
                                <div class="flex flex-col text-center w-full mb-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Conditions</h4>
                                </div>
                                {{-- <div class="lg:w-1/2 md:w-2/3 mx-auto"> --}}
                                    {{-- <x-input-error :messages="$errors->all()" class="mb-4"  /> --}}
                                    {{-- <form method="post" action="{{ route('user.profile.store') }}"> --}}
                                    {{-- @csrf --}}
                                <div class="m-2">
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="degassing_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature(脱気温度) ℃</label>
                                          <input type="number" id="degassing_temperature" name="degassing_temperature" value="{{ old('degassing_temperature') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="dish_type" class="leading-7 text-sm text-gray-600">Dish Type(ペトリ皿のタイプ)</label>
                                          <input type="text" id="dish_type" name="dish_type" value="{{ old('dish_type') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative"> 
                                          <label for="dish_area" class="leading-7 text-sm text-gray-600">Dish Area(ペトリ皿の表面積) cm^2</label>
                                          <input type="number" id="dish_area" name="dish_area" value="{{ old('dish_area') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="casting_ml" class="leading-7 text-sm text-gray-600">Casting(キャスティング量) ml</label>
                                          <input type="number" id="casting_ml" name="casting_ml" value="{{ old('casting_ml') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="incubator_type" class="leading-7 text-sm text-gray-600">Incubator Type(インキュベータの種類)</label>
                                          <input type="text" id="incubator_type" name="incubator_type" value="{{ old('incubator_type') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature(乾燥温度) ℃</label>
                                          <input type="number" id="drying_temperature" name="drying_temperature" value="{{ old('drying_temperature') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity(乾燥温度) %RH</label>
                                          <input type="number" id="drying_humidity" name="drying_humidity" value="{{ old('drying_humidity') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time(乾燥時間) h</label>
                                          <input type="number" id="drying_time" name="drying_time" value="{{ old('drying_time') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    
                                </div>
                            



                                <div class="flex flex-col text-center w-full mb-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Conditions</h4>
                                </div>
                                <div class="m-2">
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="degassing_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature(脱気温度) ℃</label>
                                          <input type="number" id="degassing_temperature" name="degassing_temperature" value="{{ old('degassing_temperature') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="dish_type" class="leading-7 text-sm text-gray-600">Dish Type(ペトリ皿のタイプ)</label>
                                          <input type="text" id="dish_type" name="dish_type" value="{{ old('dish_type') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative"> 
                                          <label for="dish_area" class="leading-7 text-sm text-gray-600">Dish Area(ペトリ皿の表面積) cm^2</label>
                                          <input type="number" id="dish_area" name="dish_area" value="{{ old('dish_area') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="casting_ml" class="leading-7 text-sm text-gray-600">Casting(キャスティング量) ml</label>
                                          <input type="number" id="casting_ml" name="casting_ml" value="{{ old('casting_ml') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="incubator_type" class="leading-7 text-sm text-gray-600">Incubator Type(インキュベータの種類)</label>
                                          <input type="text" id="incubator_type" name="incubator_type" value="{{ old('incubator_type') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature(乾燥温度) ℃</label>
                                          <input type="number" id="drying_temperature" name="drying_temperature" value="{{ old('drying_temperature') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity(乾燥温度) %RH</label>
                                          <input type="number" id="drying_humidity" name="drying_humidity" value="{{ old('drying_humidity') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time(乾燥時間) h</label>
                                          <input type="number" id="drying_time" name="drying_time" value="{{ old('drying_time') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    <div class="p-2 w-full flex justify-around mt-4">
                                        <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                        <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                    </div>
                                </div>
                              </div>





                            </form>
                          {{-- </div> --}}
                        {{-- </div> --}}

                        
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
