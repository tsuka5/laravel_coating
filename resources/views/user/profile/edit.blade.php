<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Edit Experiment Data
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <section class="text-gray-600 body-font relative">
                      <div class="container px-5 mx-auto">
                        <div class="flex flex-col text-center w-full mb-4 mt-12">
                          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Experiment</h1>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <x-input-error :messages="$errors->all()" class="mb-4"  />
                          <form method="post" action="{{ route('user.profile.update', ['profile' => $experiment->id]) }}">
                            @method('PUT') 
                            {{-- アップデートの時はpostがサポートしてないから疑似的にputで送っているという意味 --}}
                            @csrf
                            <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                  <input type="text" id="title" name="title" value="{{ $experiment->title }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                  <input type="text" id="name" name="name" value="{{ $experiment->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                  <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
                                  <input type="date" id="date" name="date" value="{{ $experiment->date }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="paper" class="leading-7 text-sm text-gray-600">Paper</label>
                                    <input type="text" id="paper" name="paper" value="{{ $experiment->paper }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>


                            {{-- <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Materials</h4>
                            </div>
                             
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="m_name" class="leading-7 text-sm text-gray-600">Name</label>
                                    <input type="text" name="m_name" value="{{ $experiment->material->m_name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="m_name" wire:model.defer="m_name">
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                                    <input type="number" name="price" value="{{ old('price') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="price" wire:model.defer="price">
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="materials.{{ $key }}.concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                                    <input type="number" name="concentration" value="{{ old('concentration') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="concentration" wire:model.defer="concentration">
            
                                    @error("concentration")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("concentration") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="heat" class="leading-7 text-sm text-gray-600">Heat</label>
                                    <input type="number" name="heat" value="{{ old('heat') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="heat" wire:model.defer="heat">
            
                                    @error("heat")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("heat") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="water_temperature" class="leading-7 text-sm text-gray-600">Water Temperature</label>
                                    <input type="number" name="water_temperature" value="{{ old('water_temperature') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="water_temperature" wire:model.defer="water_temperature">
            
                                    @error("water_temperature")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("water_temperature") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="material_rate" class="leading-7 text-sm text-gray-600">Material Rate</label>
                                    <input type="number" name="material_rate" value="{{ old('material_rate') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="material_rate" wire:model.defer="material_rate">
            
                                    @error("material_rate")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("material_rate") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="starler_speed" class="leading-7 text-sm text-gray-600">Starler Speed</label>
                                    <input type="number" name="starler_speed" value="{{ old('starler_speed') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="starler_speed" wire:model.defer="starler_speed">
            
                                    @error("starler_speed")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("starler_speed") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="repeat" class="leading-7 text-sm text-gray-600">Rpeat</label>
                                    <input type="number" name="repeat" value="{{ old('repeat') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="repeat" wire:model.defer="repeat">
            
                                    @error("repeat")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("repeat") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="staler_time" class="leading-7 text-sm text-gray-600">Staler Time</label>
                                    <input type="number" name="staler_time" value="{{ old('staler_time') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="staler_time" wire:model.defer="staler_time">
            
                                    @error("staler_time")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("staler_time") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">pH Adjustment</label>
                                    <input type="number" name="ph_adjustment" value="{{ old('ph_adjustment') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="ph_adjustment" wire:model.defer="ph_adjustment">
            
                                    @error("ph_adjustment")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("ph_adjustment") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="ph_material" class="leading-7 text-sm text-gray-600">pH Material </label>
                                    <input type="number" name="ph_material" value="{{ old('ph_material') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="ph_material" wire:model.defer="ph_material">
            
                                    @error("ph_material")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("ph_material") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="ph_target" class="leading-7 text-sm text-gray-600">pH target</label>
                                    <input type="number" name="ph_target" value="{{ old('ph_target') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="ph_target" wire:model.defer="ph_target">
            
                                    @error("ph_target")
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first("ph_target") }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}
            
                        </div>


                              
                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                  <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Conditions</h4>
                              </div>
                              
                              <div class="m-2">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="degassing_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature<br>(脱気温度) ℃</label>
                                        <input type="number" id="degassing_temperature" name="degassing_temperature" value="{{ $experiment->film_comdition->degassing_temperature }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="dish_type" class="leading-7 text-sm text-gray-600">Dish Type(ペトリ皿のタイプ)</label>
                                        <input type="text" id="dish_type" name="dish_type" value="{{ $experiment->film_comdition->dish_type }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="dish_area" class="leading-7 text-sm text-gray-600">Dish Area<br>(ペトリ皿の表面積) cm^2</label>
                                        <input type="number" id="dish_area" name="dish_area" value="{{ $experiment->film_comdition->dish_area }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="casting_ml" class="leading-7 text-sm text-gray-600">Casting(キャスティング量) ml</label>
                                        <input type="number" id="casting_ml" name="casting_ml" value="{{ $experiment->film_comdition->casting_ml }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="incubator_type" class="leading-7 text-sm text-gray-600">Incubator Type<br>(インキュベータの種類)</label>
                                        <input type="text" id="incubator_type" name="incubator_type" value="{{ $experiment->film_comdition->incubator_type }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature<br>(乾燥温度) ℃</label>
                                        <input type="number" id="drying_temperature" name="drying_temperature" value="{{ $experiment->film_comdition->drying_temperature }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity<br>(乾燥温度) %RH</label>
                                        <input type="number" id="drying_humidity" name="drying_humidity" value="{{ $experiment->film_comdition->drying_humidity }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time(乾燥時間) h</label>
                                        <input type="number" id="drying_time" name="drying_time" value="{{ $experiment->film_comdition->drying_time }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                              </div>
                          



                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                  <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Charactaristic Test</h4>
                              </div>
                              <div class="m-2">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">ph </label>
                                        <input type="number" id="ph" name="ph" value="{{ $experiment->charactaristic_test->ph }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate(せん断速度)</label>
                                        <input type="number" id="shear_rate" name="shear_rate" value="{{ $experiment->charactaristic_test->shear_rate }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress(せん断応力) </label>
                                        <input type="number" id="shear_stress" name="shear_stress" value="{{ $experiment->charactaristic_test->shear_stress }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity(粘度)</label>
                                        <input type="number" id="viscosity" name="viscosity" value="{{ $experiment->charactaristic_test->viscosity }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content(含水量)</label>
                                        <input type="number" id="moisture_content" name="moisture_content" value="{{ $experiment->charactaristic_test->moisture_content }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="water_solubility" class="leading-7 text-sm text-gray-600">Water Solubility(溶解度)</label>
                                        <input type="number" id="water_solubility" name="water_solubility" value="{{ $experiment->charactaristic_test->water_solubility }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="wvp" class="leading-7 text-sm text-gray-600">WVP(水蒸気透過性)</label>
                                        <input type="number" id="wvp" name="wvp" value="{{ $experiment->charactaristic_test->wvp }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness(厚さ) mm</label>
                                        <input type="number" id="thickness" name="thickness" value="{{ $experiment->charactaristic_test->thickness }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="contact_angle" class="leading-7 text-sm text-gray-600">Contact Angle(接触角) ℃</label>
                                      <input type="number" id="contact_angle" name="contact_angle" value="{{ $experiment->charactaristic_test->contact_angle }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="tensile_strength" class="leading-7 text-sm text-gray-600">Tensile Strength(引張強度)</label>
                                      <input type="number" id="tensile_strength" name="tensile_strength" value="{{ $experiment->charactaristic_test->tensile_strength }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>


                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                          </div>
                          <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="s_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                    <input type="text" id="s_name" name="s_name" value="{{ $experiment->storing_test->s_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="storing_days" class="leading-7 text-sm text-gray-600">Storing days</label>
                                    <input type="number" id="storing_days" name="storing_days" value="{{ $experiment->storing_test->storing_days }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                    <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate </label>
                                    <input type="number" id="mass_loss_rate" name="mass_loss_rate" value="{{ $experiment->storing_test->mass_loss_rate }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="color_l" class="leading-7 text-sm text-gray-600">*L</label>
                                    <input type="number" id="color_l" name="color_l" value="{{ $experiment->storing_test->color_l }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="color_a" class="leading-7 text-sm text-gray-600">*b</label>
                                    <input type="number" id="color_a" name="color_a" value="{{ $experiment->storing_test->color_a }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="color_b" class="leading-7 text-sm text-gray-600">*b</label>
                                  <input type="number" id="color_b" name="color_b" value="{{ $experiment->storing_test->color_b }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="color_e" class="leading-7 text-sm text-gray-600">⊿*E</label>
                                    <input type="number" id="color_e" name="color_e" value="{{ $experiment->storing_test->color_e }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                                    <input type="number" id="ph" name="ph" value="{{ $experiment->storing_test->ph }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                                  <input type="number" id="tss" name="tss" value="{{ $experiment->storing_test->tss }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness</label>
                                  <input type="number" id="hardness" name="hardness" value="{{ $experiment->storing_test->hardness }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>

                          <div class="flex flex-col text-center w-full mb-4 mt-12">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Antibacteria Test</h4>
                        </div>
                        <div class="m-2">
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="a_name" class="leading-7 text-sm text-gray-600">Bacteria Name </label>
                                  <input type="text" id="a_name" name="a_name" value="{{ $experiment->antibacteria_test->a_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="bacteria_rate" class="leading-7 text-sm text-gray-600">Bacteria Rate</label>
                                  <input type="number" id="bacteria_rate" name="bacteria_rate" value="{{ $experiment->antibacteria_test->bacteria_rate }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative"> 
                                  <label for="a_moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content </label>
                                  <input type="number" id="a_moisture_content" name="a_moisture_content" value="{{ $experiment->antibacteria_test->a_moisture_content }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                  <input type="file" id="afm" name="afm" value="{{ $experiment->antibacteria_test->afm }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                  <input type="file" id="sem" name="sem" value="{{ $experiment->antibacteria_test->sem }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                <input type="file" id="dsc" name="dsc" value="{{ $experiment->antibacteria_test->dsc }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="ftir" class="leading-7 text-sm text-gray-600">FTIR</label>
                                  <input type="file" id="ftir" name="ftir" value="{{ $experiment->antibacteria_test->ftir }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                              
                              
                              <div class="p-2 w-full flex justify-around mt-4">
                                <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>
                              </div>
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
