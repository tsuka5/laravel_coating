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
                          <div class="flex flex-col text-center w-full mb-4 mt-4">
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

                               
                                <livewire:material></livewire:material>

                                <livewire:additive></livewire:additive>


                                 {{-- <div class="container px-5 mx-auto"> --}}
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Conditions</h4>
                                </div>
                                {{-- <div class="lg:w-1/2 md:w-2/3 mx-auto"> --}}
                                    {{-- <x-input-error :messages="$errors->all()" class="mb-4"  /> --}}
                                    {{-- <form method="post" action="{{ route('user.profile.store') }}"> --}}
                                    {{-- @csrf --}}
                                <div class="m-2">
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="degassing_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature<br>(脱気温度) ℃</label>
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
                                          <label for="dish_area" class="leading-7 text-sm text-gray-600">Dish Area<br>(ペトリ皿の表面積) cm^2</label>
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
                                          <label for="incubator_type" class="leading-7 text-sm text-gray-600">Incubator Type<br>(インキュベータの種類)</label>
                                          <input type="text" id="incubator_type" name="incubator_type" value="{{ old('incubator_type') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature<br>(乾燥温度) ℃</label>
                                          <input type="number" id="drying_temperature" name="drying_temperature" value="{{ old('drying_temperature') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity<br>(乾燥温度) %RH</label>
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
                            



                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Charactaristic Test</h4>
                                </div>
                                <div class="m-2">
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="ph" class="leading-7 text-sm text-gray-600">ph </label>
                                          <input type="number" id="ph" name="ph" value="{{ old('ph') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate(せん断速度)</label>
                                          <input type="number" id="shear_rate" name="shear_rate" value="{{ old('shear_rate') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative"> 
                                          <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress(せん断応力) </label>
                                          <input type="number" id="shear_stress" name="shear_stress" value="{{ old('shear_stress') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity(粘度)</label>
                                          <input type="number" id="viscosity" name="viscosity" value="{{ old('viscosity') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content(含水量)</label>
                                          <input type="number" id="moisture_content" name="moisture_content" value="{{ old('moisture_content') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="water_solubility" class="leading-7 text-sm text-gray-600">Water Solubility(溶解度)</label>
                                          <input type="number" id="water_solubility" name="water_solubility" value="{{ old('water_solubility') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="wvp" class="leading-7 text-sm text-gray-600">WVP(水蒸気透過性)</label>
                                          <input type="number" id="wvp" name="wvp" value="{{ old('wvp') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness(厚さ) mm</label>
                                          <input type="number" id="thickness" name="thickness" value="{{ old('thickness') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="contact_angle" class="leading-7 text-sm text-gray-600">Contact Angle(接触角) ℃</label>
                                        <input type="number" id="contact_angle" name="contact_angle" value="{{ old('contact_angle') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="tensile_strength" class="leading-7 text-sm text-gray-600">Tensile Strength(引張強度)</label>
                                        <input type="number" id="tensile_strength" name="tensile_strength" value="{{ old('tensile_strength') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                    </div>


                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                            </div>
                            <div class="m-2">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="s_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                      <input type="text" id="s_name" name="s_name" value="{{ old('s_name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="storing_days" class="leading-7 text-sm text-gray-600">Storing days</label>
                                      <input type="number" id="storing_days" name="storing_days" value="{{ old('storing_days') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative"> 
                                      <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate </label>
                                      <input type="number" id="mass_loss_rate" name="mass_loss_rate" value="{{ old('mass_loss_rate') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="color_l" class="leading-7 text-sm text-gray-600">*L</label>
                                      <input type="number" id="color_l" name="color_l" value="{{ old('color_l') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="color_a" class="leading-7 text-sm text-gray-600">*b</label>
                                      <input type="number" id="color_a" name="color_a" value="{{ old('color_a') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="color_b" class="leading-7 text-sm text-gray-600">*b</label>
                                    <input type="number" id="color_b" name="color_b" value="{{ old('color_b') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="color_e" class="leading-7 text-sm text-gray-600">⊿*E</label>
                                      <input type="number" id="color_e" name="color_e" value="{{ old('color_e') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                                      <input type="number" id="ph" name="ph" value="{{ old('ph') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                                    <input type="number" id="tss" name="tss" value="{{ old('tss') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness</label>
                                    <input type="number" id="hardness" name="hardness" value="{{ old('hardness') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>


                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                  <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Charactaristic Test</h4>
                              </div>
                              <div class="m-2">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">ph </label>
                                        <input type="number" id="ph" name="ph" value="{{ old('ph') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate(せん断速度)</label>
                                        <input type="number" id="shear_rate" name="shear_rate" value="{{ old('shear_rate') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress(せん断応力) </label>
                                        <input type="number" id="shear_stress" name="shear_stress" value="{{ old('shear_stress') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity(粘度)</label>
                                        <input type="number" id="viscosity" name="viscosity" value="{{ old('viscosity') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content(含水量)</label>
                                        <input type="number" id="moisture_content" name="moisture_content" value="{{ old('moisture_content') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="water_solubility" class="leading-7 text-sm text-gray-600">Water Solubility(溶解度)</label>
                                        <input type="number" id="water_solubility" name="water_solubility" value="{{ old('water_solubility') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="wvp" class="leading-7 text-sm text-gray-600">WVP(水蒸気透過性)</label>
                                        <input type="number" id="wvp" name="wvp" value="{{ old('wvp') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness(厚さ) mm</label>
                                        <input type="number" id="thickness" name="thickness" value="{{ old('thickness') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="contact_angle" class="leading-7 text-sm text-gray-600">Contact Angle(接触角) ℃</label>
                                      <input type="number" id="contact_angle" name="contact_angle" value="{{ old('contact_angle') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="tensile_strength" class="leading-7 text-sm text-gray-600">Tensile Strength(引張強度)</label>
                                      <input type="number" id="tensile_strength" name="tensile_strength" value="{{ old('tensile_strength') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>

                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Antibacteria Test</h4>
                          </div>
                          <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="a_name" class="leading-7 text-sm text-gray-600">Bacteria Name </label>
                                    <input type="text" id="a_name" name="a_name" value="{{ old('a_name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="bacteria_rate" class="leading-7 text-sm text-gray-600">Bacteria Rate</label>
                                    <input type="number" id="bacteria_rate" name="bacteria_rate" value="{{ old('bacteria_rate') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                    <label for="a_moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content </label>
                                    <input type="number" id="a_moisture_content" name="a_moisture_content" value="{{ old('a_moisture_content') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                    <input type="file" id="afm" name="afm" value="{{ old('afm') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                    <input type="file" id="sem" name="sem" value="{{ old('sem') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                  <input type="file" id="dsc" name="dsc" value="{{ old('dsc') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ftir" class="leading-7 text-sm text-gray-600">FTIR</label>
                                    <input type="file" id="ftir" name="ftir" value="{{ old('ftir') }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
