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
                          <form method="post" enctype="multipart/form-data" action="{{ route('user.profile.update', ['profile' => $experiment->id]) }}">
                            @method('PUT')  
                            @csrf
                            
                            <div class="m-2">
                              <div class="flex flex-wrap">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                    <input type="text" id="title" name="title" value="{{ $experiment->title }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                     focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $experiment->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                     focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative"> 
                                    <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
                                    <input type="date" id="date" name="date" value="{{ $experiment->date }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                     focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="paper_name" class="leading-7 text-sm text-gray-600">Paper</label>
                                      <input type="text" id="paper_name" name="paper_name" value="{{ $experiment->paper_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                       focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="paper_url" class="leading-7 text-sm text-gray-600">Paper URL</label>
                                    <input type="text" id="paper_url" name="paper_url" value="{{ $experiment->paper_url }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                     focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <HR>


                              
                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Materials</h4>
                              </div>

                             
                              @foreach ($materials as $material)
                             
                              <div class="flex flex-wrap">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="material_name" class="leading-7 text-sm text-gray-600">Name</label>
                                      <select name="material_name[{{ $material->id }}]" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                         focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="{{ $material->material_detail->name}}">{{$material->material_detail->name}} </option>
                                        @foreach ($materials_list as $selected_material)
                                        <option value="{{ $selected_material->name }}"> {{ $selected_material->name }}</option>
                                        @endforeach
                                      </select>                    
                                  </div>
                                </div>
                          
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                                        <input type="number" name="concentration[{{ $material->id }}]" value="{{ $material->concentration }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                         focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                            id="concentration">
                                    </div>
                                </div>
                
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">ph Adjustment (Yes or No)</label>
                                        <select name="ph_adjustment" data-toggle="select" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300
                                         focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                          <option value="{{ $material->ph_adjustment }}">
                                            @if ( $material->ph_adjustment == 1)
                                              Yes
                                            @else
                                              No
                                            @endif
                                          </option>
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="ph_material" class="leading-7 text-sm text-gray-600">Material Name for ph Adjustment</label>
                                      <select name="ph_material[{{ $material->id }}]" data-toggle="select" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2
                                         focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="{{ isset($material->ph_material_detail) ? $material->ph_material_detail->name : '' }}">
                                          @if ($material->ph_material_id == null)
                                            Nothing
                                          @else
                                            {{$material->ph_material_detail->name}}
                                          @endif
                                            </option>
                                        @foreach ($ph_materials_list as $selected_ph_material)
                                          <option value="{{ $selected_ph_material->name }}"> {{ $selected_ph_material->name }}</option>
                                        @endforeach
                                      </select>                    
                                  </div>
                                </div>
                
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph_purpose" class="leading-7 text-sm text-gray-600">pH purpose</label>
                                        <input type="number" name="ph_purpose[{{ $material->id }}]" value="{{ $material->ph_purpose }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                                         focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                            id="ph_pu">
                                    </div>
                                </div> 
                              </div>
                              <HR>
                              @endforeach

                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Conditions</h4>
                            </div>
                              
                            @foreach ($film_conditions as $film_condition)

                            <div class="m-2">
                              <div class="flex flex-wrap">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="casting_amount" class="leading-7 text-sm text-gray-600">Casting amount (ml)</label>
                                    <input type="number" id="casting_amount" name="casting_amount[{{ $film_condition->id }}]" value="{{ $film_condition->casting_amount }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative"> 
                                      <label for="petri_dish_area" class="leading-7 text-sm text-gray-600">Petri Dish Area (cm^2)</label>
                                      <input type="number" id="petri_dish_area" name="petri_dish_area[{{ $film_condition->id }}]" value="{{ $film_condition->petri_dish_area }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="degas_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature (℃)</label>
                                      <input type="number" id="degas_temperature" name="degas_temperature[{{ $film_condition->id }}]" value="{{ $film_condition->degas_temperature }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature (℃)</label>
                                    <input type="number" id="drying_temperature" name="drying_temperature[{{ $film_condition->id }}]" value="{{ $film_condition->drying_temperature }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity (%RH)</label>
                                      <input type="number" id="drying_humidity" name="drying_humidity[{{ $film_condition->id }}]" value="{{ $film_condition->drying_humidity }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time (h)</label>
                                      <input type="number" id="drying_time" name="drying_time[{{ $film_condition->id }}]" value="{{ $film_condition->drying_time }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                              </div>
                            </div>
                            <HR>
                            @endforeach
                          
                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                  <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Characteristic Test</h4>
                              </div>

                              @foreach ($charactaristic_tests as $charactaristic_test)
                              <div class="m-2">
                                <div class="flex flex-wrap">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">pH </label>
                                        <input type="number" id="ph" name="ph[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->ph }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="temperature" class="leading-7 text-sm text-gray-600">Temperature (℃) </label>
                                        <input type="number" id="temperature" name="temperature[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->temperature }}" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>  
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate (1/s)</label>
                                        <input type="number" id="shear_rate" name="shear_rate[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->shear_rate }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress (Pa・s) </label>
                                        <input type="number" id="shear_stress" name="shear_stress[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->shear_stress }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="rotation_speed" class="leading-7 text-sm text-gray-600">Rotation Speed (rpm)</label>
                                        <input type="number" id="rotation_speed" name="rotation_speed[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->rotation_speed }}" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity (cP)</label>
                                        <input type="number" id="viscosity" name="viscosity[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->viscosity }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="mc" class="leading-7 text-sm text-gray-600">Moisture Content (％)</label>
                                        <input type="number" id="mc" name="mc[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->mc }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="ws" class="leading-7 text-sm text-gray-600">Water Solubility (％)</label>
                                        <input type="number" id="ws" name="ws[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->ws }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="wvp" class="leading-7 text-sm text-gray-600">Water Vapor Permeabilty (g・mm/(m^2・day・kPa))</label>
                                        <input type="number" id="wvp" name="wvp[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->wvp }}" step=0.001 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness (mm)</label>
                                        <input type="number" id="thickness" name="thickness[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->thickness }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="ca" class="leading-7 text-sm text-gray-600">Contact Angle (°)</label>
                                      <input type="number" id="ca" name="ca[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->ca }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="ts" class="leading-7 text-sm text-gray-600">Tensile Strength (MPa)</label>
                                      <input type="number" id="ts" name="ts[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->ts }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="d43" class="leading-7 text-sm text-gray-600">D43 ()</label>
                                    <input type="number" id="d43" name="d43[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->d43 }}" step="0.01"placeholder="Enter d43 value.(ex: 30)"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="d32" class="leading-7 text-sm text-gray-600">D32 ()</label>
                                      <input type="number" id="d32" name="d32[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->d32 }}" step="0.01"placeholder="Enter d32 value.(ex: 40)"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="eab" class="leading-7 text-sm text-gray-600">EAB (%)</label>
                                      <input type="number" id="eab" name="eab[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->eab }}" step="0.01"placeholder="Enter eab value.(ex: 40)"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="light_transmittance" class="leading-7 text-sm text-gray-600">Light Trancemittance (%)</label>
                                      <input type="number" id="light_transmittance" name="light_transmittance[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->light_transmittance }}" step="0.01"placeholder="Enter TS value.(ex: 40)"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="xrd" class="leading-7 text-sm text-gray-600">XRD (nm)</label>
                                      <input type="number" id="xrd" name="xrd[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->xrd }}" step="0.01"placeholder="Enter XRD value.(ex: 40)"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  
                                    <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                      <img src="{{ asset('storage/'.$charactaristic_test->afm) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                      <input type="file" id="afm" name="afm[{{ $charactaristic_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                        <img src="{{ asset('storage/'.$charactaristic_test->sem) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                        <input type="file" id="sem" name="sem[{{ $charactaristic_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                      <img src="{{ asset('storage/'.$charactaristic_test->dsc) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                      <input type="file" id="dsc" name="dsc[{{ $charactaristic_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="ftir" class="leading-7 text-sm text-gray-600">FTIR</label>
                                        <img src="{{ asset('storage/'.$charactaristic_test->ftir) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                        <input type="file" id="ftir" name="ftir[{{ $charactaristic_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <HR>
                              @endforeach


                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                          </div>
                          @foreach ($storing_tests as $storing_test)
                          <div class="m-2">
                            <div class="flex flex-wrap">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="fruit_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                    <select name="storing_fruit_name[{{ $storing_test->id}}]" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      <option value="{{ $storing_test->fruit_detail->name }}">{{ $storing_test->fruit_detail->name}}</option>
                                      @foreach ($fruits_list as $selected_fruit)
                                      <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                                      @endforeach
                                    </select>                                      
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="storing_temperature" class="leading-7 text-sm text-gray-600">Storing temperature (℃)</label>
                                    <input type="number" id="storing_temperature" name="storing_temperature[{{ $storing_test->id}}]" value="{{ $storing_test->storing_temperature }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="storing_humidity" class="leading-7 text-sm text-gray-600">Storing humidity (%)</label>
                                    <input type="number" id="storing_humidity" name="storing_humidity[{{ $storing_test->id}}]" value="{{ $storing_test->storing_humidity }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="storing_day" class="leading-7 text-sm text-gray-600">Storing day</label>
                                    <input type="number" id="storing_day" name="storing_day[{{ $storing_test->id}}]" value="{{ $storing_test->storing_day }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                    <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate (%)</label>
                                    <input type="number" id="mass_loss_rate" name="mass_loss_rate[{{ $storing_test->id}}]" value="{{ $storing_test->mass_loss_rate }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="l" class="leading-7 text-sm text-gray-600">*L</label>
                                    <input type="number" id="l" name="l[{{ $storing_test->id}}]" value="{{ $storing_test->l }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="a" class="leading-7 text-sm text-gray-600">*a</label>
                                    <input type="number" id="a" name="a[{{ $storing_test->id}}]" value="{{ $storing_test->a }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="b" class="leading-7 text-sm text-gray-600">*b</label>
                                  <input type="number" id="b" name="b[{{ $storing_test->id}}]" value="{{ $storing_test->b }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="e" class="leading-7 text-sm text-gray-600">⊿*E</label>
                                    <input type="number" id="e" name="e[{{ $storing_test->id}}]" value="{{ $storing_test->e }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                                    <input type="number" id="ph" name="ph[{{ $storing_test->id}}]" value="{{ $storing_test->ph }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                                  <input type="number" id="tss" name="tss[{{ $storing_test->id}}]" value="{{ $storing_test->tss }}" step=0.001 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness</label>
                                  <input type="number" id="hardness" name="hardness[{{ $storing_test->id}}]" value="{{ $storing_test->hardness }}" step=0.001 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                    <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content </label>
                                    <input type="number" id="moisture_content" name="moisture_content[{{ $storing_test->id }}]" value="{{ $storing_test->moisture_content }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="ta" class="leading-7 text-sm text-gray-600">TA (%)</label>
                                    <input type="number" id="ta" name="ta[{{ $storing_test->id }}]" step="0.1" value="{{ $storing_test->ta }}" step="0.001" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="vitamin_c" class="leading-7 text-sm text-gray-600">Vitamin C</label>
                                  <input type="number" id="vitamin_c" name="vitamin_c[{{ $storing_test->id }}]" value="{{ $storing_test->vitamin_c }}" step="0.001" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="rr" class="leading-7 text-sm text-gray-600">RR</label>
                                  <input type="number" id="rr" name="rr[{{ $storing_test->id }}]" value="{{ $storing_test->rr }}" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative mb-4">
                                    <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                    <img src="{{ asset('storage/'.$storing_test->afm) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                    <input type="file" id="afm" name="s-afm[{{ $storing_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative mb-4">
                                    <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                    <img src="{{ asset('storage/'.$storing_test->sem) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                    <input type="file" id="sem" name="s-sem[{{ $storing_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative mb-4">
                                    <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                    <img src="{{ asset('storage/'.$storing_test->dsc) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                    <input type="file" id="dsc" name="s-dsc[{{ $storing_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative mb-4">
                                    <label for="ftir" class="leading-7 text-sm text-gray-600">FT-IR</label>
                                    <img src="{{ asset('storage/'.$storing_test->ftir) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                    <input type="file" id="ftir" name="s-ftir[{{ $storing_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative mb-4">
                                    <label for="clsm" class="leading-7 text-sm text-gray-600">CLSM</label>
                                    <img src="{{ asset('storage/'.$storing_test->clsm) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                    <input type="file" id="clsm" name="s-clsm[{{ $storing_test->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                            </div>
                          </div>
                          <HR>
                          @endforeach


                          <div class="flex flex-col text-center w-full mb-4 mt-12">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Antibacteria Test</h4>
                        </div>
                        @foreach ($antibacteria_tests as $antibacteria_test)
                        <div class="m-2">
                          <div class="flex flex-wrap">
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="bacteria_name" class="leading-7 text-sm text-gray-600">Bacteria Name </label>
                                  <select name="bacteria_name[{{ $antibacteria_test->id }}]" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="{{ $antibacteria_test->bacteria_detail->name }}">{{ $antibacteria_test->bacteria_detail->name}}</option>
                                    @foreach ($bacteria_list as $selected_bacteria)
                                    <option value="{{ $selected_bacteria->name }}"> {{ $selected_bacteria->name }}</option>
                                    @endforeach
                                  </select>                                      
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="fruit_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                  <select name="antibacteria_fruit_name[{{ $antibacteria_test->id }}]" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="{{ $antibacteria_test->fruit_detail->name }}">{{ $antibacteria_test->fruit_detail->name}}</option>
                                    @foreach ($fruits_list as $selected_fruit)
                                    <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                                    @endforeach
                                  </select>                                      
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="test_type" class="leading-7 text-sm text-gray-600">Test Type </label>
                                  <select name="test_name[{{ $antibacteria_test->id }}]" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="{{ $antibacteria_test->antibacteria_test_type->name }}">{{ $antibacteria_test->antibacteria_test_type->name}}</option>
                                    @foreach ($antibacteria_test_list as $selected_test_type)
                                    <option value="{{ $selected_test_type->name }}"> {{ $selected_test_type->name }}</option>
                                    @endforeach
                                  </select>                                      
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="invivo_invitro" class="leading-7 text-sm text-gray-600">Invivo or Invitro (Yes or No)</label>
                                  <select name="invivo_invitro" data-toggle="select" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="{{ $antibacteria_test->invivo_invitro }}">
                                      @if ( $antibacteria_test->invivo_invitro == 1)
                                        Invivo
                                      @else
                                        Invitro
                                      @endif
                                    </option>
                                    <option value="1">Invivo</option>
                                    <option value="0">Invitro</option>
                                  </select>
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="bacteria_concentration" class="leading-7 text-sm text-gray-600">Bacteria Concentration</label>
                                  <input type="number" id="bacteria_concentration" name="bacteria_concentration[{{ $antibacteria_test->id }}]" value="{{ $antibacteria_test->bacteria_concentra }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative"> 
                                  <label for="mic" class="leading-7 text-sm text-gray-600">MIC </label>
                                  <input type="number" id="mic" name="mic[{{ $antibacteria_test->id }}]" value="{{ $antibacteria_test->mic }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                          </div>
                        </div>
                        <HR>
                        @endforeach
                          
                        <div class="flex flex-col text-center w-full mb-4 mt-12">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Note</h4>
                        </div>

                        @foreach ($notes as $note)
                        <div class="m-2">
                          <div class="flex flex-wrap">
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="note" class="leading-7 text-sm text-gray-600">Note </label>
                                  <textarea id="note" name="note[{{ $note->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-6 transition-colors duration-200 ease-in-out" maxlength="1000" rows="7" cols="20">{{ $note->note }}</textarea>
                              </div>
                            </div>
                            
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="img1" class="leading-7 text-sm text-gray-600">Image1</label>
                                <img src="{{ asset('storage/'.$note->img1) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                <input type="file" id="img1" name="img1[{{ $note->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="img2" class="leading-7 text-sm text-gray-600">Image2</label>
                                <img src="{{ asset('storage/'.$note->img2) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                <input type="file" id="img2" name="img2[{{ $note->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="img3" class="leading-7 text-sm text-gray-600">Image3</label>
                                <img src="{{ asset('storage/'.$note->img3) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                <input type="file" id="img3" name="img3[{{ $note->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="img4" class="leading-7 text-sm text-gray-600">Image4</label>
                                <img src="{{ asset('storage/'.$note->img4) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                <input type="file" id="img4" name="img4[{{ $note->id }}]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                          </div>
                        </div>
                        <HR>
                        @endforeach

                              
                              
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

<script>
  function deleteImage(id) {
      if (confirm('Are you sure you want to delete this image?')) {
          fetch(`/delete-image/${id}`, {
              method: 'DELETE',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              }
          })
          .then(response => {
              if (response.ok) {
                  // 削除成功時の処理（例：画像を非表示にするなど）
                  console.log('Image deleted successfully');
              } else {
                  // 削除失敗時の処理
                  console.error('Failed to delete image');
              }
          })
          .catch(error => {
              console.error('Error:', error);
          });
      }
  }
</script>
