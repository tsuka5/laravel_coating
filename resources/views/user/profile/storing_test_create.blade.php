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
                              <form method="post" enctype="multipart/form-data" action="{{ route('user.store', ['id'=>$id, 'formType'=>'storing_test']) }}">
                                @csrf
  
                                <div class="m-2">
                                <div class="flex flex-wrap">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="fruit_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                        <select name="fruit_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                          @foreach ($fruits_list as $selected_fruit)
                                          <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                                          @endforeach
                                        </select>                                      
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="storing_temperature" class="leading-7 text-sm text-gray-600">Storing temperature  (℃)</label>
                                        <input type="number" id="storing_temperature" name="storing_temperature" value="{{ old('storing_temperature') }}" placeholder="ex: 15" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="storing_humidity" class="leading-7 text-sm text-gray-600">Storing humidity  (%RH)</label>
                                        <input type="number" id="storing_humidity" name="storing_humidity" value="{{ old('storing_humidity') }}" placeholder="ex: 45.9" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="storing_day" class="leading-7 text-sm text-gray-600">Storing days (days)</label>
                                        <input type="number" id="storing_day" name="storing_day" value="{{ old('storing_day') }}" placeholder="ex: 3" step="0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate (%)</label>
                                        <input type="number" id="mass_loss_rate" name="mass_loss_rate" value="{{ old('mass_loss_rate') }}"placeholder="ex: 3" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="l" class="leading-7 text-sm text-gray-600">L*</label>
                                        <input type="number" id="l" name="l" value="{{ old('l') }}" step=0.1 placeholder="ex: 28.6" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="a" class="leading-7 text-sm text-gray-600">a*</label>
                                        <input type="number" id="a" name="a" value="{{ old('a') }}" step="0.1" placeholder="ex: 34.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="b" class="leading-7 text-sm text-gray-600">b*</label>
                                      <input type="number" id="b" name="b" value="{{ old('b') }}" step="0.1" placeholder="ex: 19.0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="e" class="leading-7 text-sm text-gray-600">⊿E</label>
                                        <input type="number" id="e" name="e" value="{{ old('e') }}" step="0.1" placeholder="ex: 29.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                                        <input type="number" id="ph" name="ph" value="{{ old('ph') }}" step="0.01" placeholder="ex: 6.5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                                      <input type="number" id="tss" name="tss" value="{{ old('tss') }}" step="0.001" placeholder="ex: 8.8" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness (N)</label>
                                      <input type="number" id="hardness" name="hardness" value="{{ old('hardness') }}" step="0.001" placeholder="ex: 0.10" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content (%)</label>
                                        <input type="number" id="moisture_content" name="moisture_content" step="0.1" placeholder="ex: 40" value="{{ old('moisture_content') }}" step="0.01" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ta" class="leading-7 text-sm text-gray-600">TA (%)</label>
                                        <input type="number" id="ta" name="ta" step="0.1" placeholder="ex: 3.0" value="{{ old('ta') }}" step="0.001" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="vitamin_c" class="leading-7 text-sm text-gray-600">Vitamin C (%)</label>
                                      <input type="number" id="vitamin_c" name="vitamin_c" value="{{ old('vitamin_c') }}" step="0.01" placeholder="ex: 6.5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="rr" class="leading-7 text-sm text-gray-600">RR (mgCO2/(kg・h))</label>
                                      <input type="number" id="rr" name="rr" value="{{ old('rr') }}" step="0.1" placeholder="ex: 2.5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative mb-4">
                                        <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                        <input type="file" id="afm" name="afm" value="{{ old('afm') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative mb-4">
                                        <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                        <input type="file" id="sem" name="sem" value="{{ old('sem') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative mb-4">
                                        <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                        <input type="file" id="dsc" name="dsc" value="{{ old('dsc') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative mb-4">
                                        <label for="ftir" class="leading-7 text-sm text-gray-600">FT-IR</label>
                                        <input type="file" id="ftir" name="ftir" value="{{ old('ftir') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative mb-4">
                                        <label for="clsm" class="leading-7 text-sm text-gray-600">CLSM</label>
                                        <input type="file" id="clsm" name="clsm" value="{{ old('clsm') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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