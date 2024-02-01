<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Register Experiment Detail
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  <section class="text-gray-600 body-font relative">
                    @if($formType == 'material')
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
                                    <label for="material_name" class="leading-7 text-sm text-gray-600">Material Name</label>
                                    <select name="material_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                                     focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      <option value="">Select material</option>
                                      @foreach ($materials_list as $selected_material)
                                      <option value="{{ $selected_material->name }}"> {{ $selected_material->name }}</option>
                                      @endforeach
                                    </select>                    
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration (% (w/w))</label>
                                    <input type="number" id="concentration" name="concentration" value="{{ old('concentration') }}" step="0.01" placeholder="ex: 0.80" required class="w-full bg-gray-100 bg-opacity-50 rounded border
                                     border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">ph Adjustment (Yes or No)</label>
                                    <select name="ph_adjustment" data-toggle="select" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2
                                     focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <label for="ph_material" class="leading-7 text-sm text-gray-600">Material Name for ph Adjustment</label>
                                  <select name="ph_material" data-toggle="select" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2
                                  ] focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="">Select material</option>
                                    @foreach ($ph_materials_list as $selected_material)
                                    <option value="{{ $selected_material->name }}"> {{ $selected_material->name }}</option>
                                    @endforeach
                                  </select>                    
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ph_purpose" class="leading-7 text-sm text-gray-600">ph purpose</label>
                                    <input type="number" id="ph_purpose" name="ph_purpose" value="{{ old('ph_purpose') }}" step="0.01" placeholder="ex:6.0" class="w-full bg-gray-100 bg-opacity-50 rounded border
                                     border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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

                    @elseif($formType == 'film_condition')
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

                    @elseif($formType == 'charactaristic_test')
                      <div class="container px-5 mx-auto">
                        <div class="flex flex-col text-center w-full mb-4 mt-4">
                          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Characteristic Test</h4>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <x-input-error :messages="$errors->all()" class="mb-4"  />
                            <form method="post" enctype="multipart/form-data" action="{{ route('user.store', ['id'=>$id, 'formType'=>'charactaristic_test']) }}">
                              @csrf

                        
                            <div class="m-2">
                                <div class="flex flex-wrap">
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">pH </label>
                                        <input type="number" id="ph" name="ph" value="{{ old('ph') }}" step="0.01" placeholder="ex: 6.0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="temperature" class="leading-7 text-sm text-gray-600">Temperature (℃) </label>
                                        <input type="number" id="temperature" name="temperature" value="{{ old('temperature') }}" step="0.1" placeholder="ex: 23" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate (1/s) </label>
                                        <input type="number" id="shear_rate" name="shear_rate" value="{{ old('shear_rate') }}" step="0.1" placeholder="ex: 10" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress (Pa・s)</label>
                                        <input type="number" id="shear_stress" name="shear_stress" value="{{ old('shear_stress') }}" step="0.01" placeholder="ex: 2563.24" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="rotation_speed" class="leading-7 text-sm text-gray-600">Rotation Speed (rpm)</label>
                                        <input type="number" id="rotation_speed" name="rotation_speed" value="{{ old('rotation_speed') }}" step="0.1" placeholder="ex: 1000" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity (cP)</label>
                                        <input type="number" id="viscosity" name="viscosity" value="{{ old('viscosity') }}" step="0.1" placeholder="ex: 123.2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="mc" class="leading-7 text-sm text-gray-600">Moisture Content (％)</label>
                                        <input type="number" id="mc" name="mc" value="{{ old('mc') }}" step="0.01" placeholder="ex:30" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>                                    
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ws" class="leading-7 text-sm text-gray-600">Water Solubility  (％)</label>
                                        <input type="number" id="ws" name="ws" value="{{ old('ws') }}" step="0.01" placeholder="ex:30" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="wvp" class="leading-7 text-sm text-gray-600">Water Vapor Permeabilty (g・mm/(m^2・day・kPa))</label>
                                        <input type="number" id="wvp" name="wvp" value="{{ old('wvp') }}" step=0.001 placeholder="ex:25.8" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness (mm)</label>
                                        <input type="number" id="thickness" name="thickness" value="{{ old('thickness') }}" step="0.001" placeholder="ex: 0.065" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="ca" class="leading-7 text-sm text-gray-600">Contact Angle  (°)</label>
                                    <input type="number" id="ca" name="ca" value="{{ old('ca') }}" step="0.01"placeholder="ex: 40" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="ts" class="leading-7 text-sm text-gray-600">Tensile Strength (MPa)</label>
                                    <input type="number" id="ts" name="ts" value="{{ old('ts') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="d43" class="leading-7 text-sm text-gray-600">D43 (mm)</label>
                                    <input type="number" id="d43" name="d43" value="{{ old('d43') }}" step="0.0001"placeholder="ex: 0.0001"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="d32" class="leading-7 text-sm text-gray-600">D32 (mm)</label>
                                    <input type="number" id="d32" name="d32" value="{{ old('d32') }}" step="0.0001"placeholder="ex: 0.0001"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="eab" class="leading-7 text-sm text-gray-600">EAB (%)</label>
                                    <input type="number" id="eab" name="eab" value="{{ old('eab') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="light_transmittance" class="leading-7 text-sm text-gray-600">Light Trancemittance (%)</label>
                                    <input type="number" id="light_transmittance" name="light_transmittance" value="{{ old('light_transmittance') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="xrd" class="leading-7 text-sm text-gray-600">XRD (nm)</label>
                                    <input type="number" id="xrd" name="xrd" value="{{ old('xrd') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                              </div>
                                <div class="flex flex-wrap">
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

                    @elseif($formType == 'storing_test')
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
                                      <input type="number" id="l" name="l" value="{{ old('l') }}" step=0.01 placeholder="ex: 28.6" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="a" class="leading-7 text-sm text-gray-600">a*</label>
                                      <input type="number" id="a" name="a" value="{{ old('a') }}" step="0.01" placeholder="ex: 34.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="b" class="leading-7 text-sm text-gray-600">b*</label>
                                    <input type="number" id="b" name="b" value="{{ old('b') }}" step="0.01" placeholder="ex: 19.0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                    @elseif($formType == 'antibacteria_test')
                      <div class="container px-5 mx-auto">
                        <div class="flex flex-col text-center w-full mb-4 mt-4">
                          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Antibacteria Test</h4>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <x-input-error :messages="$errors->all()" class="mb-4"  />
                            <form method="post" action="{{ route('user.store', ['id'=>$id, 'formType'=>'antibacteria_test']) }}">
                              @csrf

                              <div class="m-2">
                              
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="bacteria_name" class="leading-7 text-sm text-gray-600">Bacteria Name </label>
                                      <select name="bacteria_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        @foreach ($bacteria_list as $selected_bacterium)
                                        <option value="{{ $selected_bacterium->name }}"> {{ $selected_bacterium->name }}</option>
                                        @endforeach
                                      </select>                                      
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="fruit_name" class="leading-7 text-sm text-gray-600">Fruit or Vegetable </label>
                                      <select name="fruit_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        @foreach ($fruits_list as $selected_fruit)
                                        <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                                        @endforeach
                                      </select>                                      
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="test_type" class="leading-7 text-sm text-gray-600">Test Type </label>
                                      <select name="test_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        @foreach ($antibacteria_test_list as $selected_test)
                                        <option value="{{ $selected_test->name }}"> {{ $selected_test->name }}</option>
                                        @endforeach
                                      </select>                                      
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="invivo_invitro" class="leading-7 text-sm text-gray-600">Invivo or Invitro</label>
                                      <select name="invivo_invitro" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="1">Invivo</option>
                                        <option value="0">Invitro</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="bacteria_concentration" class="leading-7 text-sm text-gray-600">Bacteria Concentration(CFU/mL)</label>
                                      <input type="number" id="bacteria_concentration" name="bacteria_concentration" step="0.01" placeholder="ex: 91000"value="{{ old('bacteria_concentration') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="mic" class="leading-7 text-sm text-gray-600">MIC</label>
                                      <input type="mic" id="mic" name="mic" value="{{ old('mic') }}" step="0.01" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                              </div>
                              
                          <div class="p-2 w-full flex justify-around mt-4">
                            <button type="button" onclick="location.href='{{ route('user.profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    @elseif($formType == 'note')
                      <div class="container px-5 mx-auto">
                        <div class="flex flex-col text-center w-full mb-4 mt-4">
                          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Note</h4>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <x-input-error :messages="$errors->all()" class="mb-4"  />
                          <form method="post" action="{{ route('user.store', ['formType'=>'note', 'id' => $id]) }}">
                            @csrf

                            <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="note" class="leading-7 text-sm text-gray-600">Note</label>
                                  <textarea id="note" name="note" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-6 transition-colors duration-200 ease-in-out" maxlength="1000" rows="7" cols="20">{{ old('note') }}</textarea>
                                </div>
                              </div>
                            </div>

                            <div class="flex flex-wrap">
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                      <label for="img1" class="leading-7 text-sm text-gray-600">image1</label>
                                      <input type="file" id="img1" name="img1" value="{{ old('img1') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                      <label for="img2" class="leading-7 text-sm text-gray-600">image2</label>
                                      <input type="file" id="img2" name="img2" value="{{ old('img2') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                        
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                    <label for="img3" class="leading-7 text-sm text-gray-600">image3</label>
                                    <input type="file" id="img3" name="img3" value="{{ old('img3') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                          
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                    <label for="img4" class="leading-7 text-sm text-gray-600">image4</label>
                                    <input type="file" id="img4" name="img4" value="{{ old('img4') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                          
                            </div>


                            <div class="p-2 w-full flex justify-around mt-4">
                              <button type="button" onclick="location.href='{{ route('user.profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                              <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                            </div>
                          </form>
                        </div>
                      </div>
                  
                    @endif
                  </section>
              </div>
          </div>
      </div>
  </div>

</x-app-layout>