


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Experiment Data
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
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->title }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative"> 
                                                <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->date }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="paper_name" class="leading-7 text-sm text-gray-600">Paper</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->paper_name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                              <label for="paper_url" class="leading-7 text-sm text-gray-600">Paper URL</label>
                                              <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->paper_url }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
    
                                
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Materials</h4>
                                </div>
    
                                
                                @foreach ($materials as $material)
                             
                                <div class="flex flex-wrap">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="material_name" class="leading-7 text-sm text-gray-600">Name</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $material->material_detail->name}}</div>
                                    </div>
                                  </div>
                            
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $material->concentration }}</div>
                                      </div>
                                  </div>
                  
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">ph Adjustment (Yes or No)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @if ( $material->ph_adjustment == 1)
                                                Yes
                                              @else
                                                No
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                  
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph_material" class="leading-7 text-sm text-gray-600">Material Name for ph Adjustment</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @if ($material->ph_material_id == null)
                                              Nothing
                                            @else
                                              {{$material->ph_material_detail->name}}
                                            @endif
                                          </div>
                                    </div>
                                  </div>
                  
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="ph_purpose" class="leading-7 text-sm text-gray-600">pH purpose</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $material->ph_purpose }}</div>
                                      </div>
                                  </div> 
                                </div>
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
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->casting_amount }}</div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative"> 
                                          <label for="petri_dish_area" class="leading-7 text-sm text-gray-600">Petri Dish Area (cm^2)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->petri_dish_area }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="degas_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature (℃)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->degas_temperature }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature (℃)</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->drying_temperature }}</div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity (%RH)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$film_condition->drying_humidity}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time (h)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->drying_time }}</div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
    
                                @endforeach
                                
                            
    
    
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Charactaristic Test</h4>
                                </div>


                              @foreach ($charactaristic_tests as $charactaristic_test)
                              <div class="m-2">
                                <div class="flex flex-wrap">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">pH </label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->ph }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="temperature" class="leading-7 text-sm text-gray-600">Temperature (℃) </label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->temperature }}</div>
                                    </div>  
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate (1/s)</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->shear_rate }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress (Pa・s) </label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->shear_stress }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="rotation_speed" class="leading-7 text-sm text-gray-600">Rotation Speed (rpm)</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->rotation_speed }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity (cP)</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->viscosity }}</div>
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="mc" class="leading-7 text-sm text-gray-600">Moisture Content (％)</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->mc }}</div>
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="ws" class="leading-7 text-sm text-gray-600">Water Solubility (％)</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->ws }}</div>
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="wvp" class="leading-7 text-sm text-gray-600">Water Vapor Permeabilty (g・mm/(m^2・day・kPa))</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->wvp }}</div>
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness (mm)</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->thickness }}</div>
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="ca" class="leading-7 text-sm text-gray-600">Contact Angle (°)</label>
                                      <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->ca }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="ts" class="leading-7 text-sm text-gray-600">Tensile Strength (MPa)</label>
                                      <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->ts }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                    <label for="d43" class="leading-7 text-sm text-gray-600">D43 ()</label>
                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->d43 }}</div>
                                </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="d32" class="leading-7 text-sm text-gray-600">D32 ()</label>
                                      <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->d32 }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="eab" class="leading-7 text-sm text-gray-600">EAB (%)</label>
                                      <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->eab }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="light_transmittance" class="leading-7 text-sm text-gray-600">Light Trancemittance (%)</label>
                                      <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->light_transmittance }}</div>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                      <label for="xrd" class="leading-7 text-sm text-gray-600">XRD ()</label>
                                      <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $charactaristic_test->xrd }}</div>
                                    </div>
                                  </div>
                                  
                                    <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                      <a href="{{ asset('storage/'.$charactaristic_test->afm) }}" download="afm_image">
                                        <img src="{{ asset('storage/'.$charactaristic_test->afm) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                      </a>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                        <a href="{{ asset('storage/'.$charactaristic_test->sem) }}" download="sem_image">
                                          <img src="{{ asset('storage/'.$charactaristic_test->sem) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                        </a>
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                      <a href="{{ asset('storage/'.$charactaristic_test->dsc) }}" download="dsc_image">
                                        <img src="{{ asset('storage/'.$charactaristic_test->dsc) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                      </a>
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="ftir" class="leading-7 text-sm text-gray-600">FTIR</label>
                                        <a href="{{ asset('storage/'.$charactaristic_test->ftir) }}" download="ftir_image">
                                          <img src="{{ asset('storage/'.$charactaristic_test->ftir) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                        </a>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              
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
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->fruit_detail->name }}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="storing_temperature" class="leading-7 text-sm text-gray-600">Storing temperature (℃)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->storing_temperature }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="storing_humidity" class="leading-7 text-sm text-gray-600">Storing humidity (%)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->storing_humidity }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="storing_day" class="leading-7 text-sm text-gray-600">Storing day</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->storing_day }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative"> 
                                          <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate (%)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->mass_loss_rate }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="l" class="leading-7 text-sm text-gray-600">*L</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->l }}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="a" class="leading-7 text-sm text-gray-600">*a</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->a }}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="b" class="leading-7 text-sm text-gray-600">*b</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->b }}</div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="e" class="leading-7 text-sm text-gray-600">⊿*E</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->e }}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                          <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->ph }}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->tss }}</div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->hardness }}</div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative"> 
                                          <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content </label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->moisture_content }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="ta" class="leading-7 text-sm text-gray-600">TA ()</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->ta }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="vitamin_c" class="leading-7 text-sm text-gray-600">Vitamin C</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->vitamin_c }}</div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="rr" class="leading-7 text-sm text-gray-600">RR</label>
                                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $storing_test->rr }}</div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative mb-4">
                                          <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                          <a href="{{ asset('storage/'.$storing_test->afm) }}" download="afm_image">
                                            <img src="{{ asset('storage/'.$storing_test->afm) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                          </a>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative mb-4">
                                          <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                          <a href="{{ asset('storage/'.$storing_test->sem) }}" download="sem_image">
                                            <img src="{{ asset('storage/'.$storing_test->sem) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                          </a>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative mb-4">
                                          <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                          <a href="{{ asset('storage/'.$storing_test->dsc) }}" download="dsc_image">
                                            <img src="{{ asset('storage/'.$storing_test->dsc) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                          </a>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative mb-4">
                                          <label for="ftir" class="leading-7 text-sm text-gray-600">FT-IR</label>
                                          <a href="{{ asset('storage/'.$storing_test->ftir) }}" download="ftir_image">
                                            <img src="{{ asset('storage/'.$storing_test->ftir) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                          </a>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative mb-4">
                                          <label for="clsm" class="leading-7 text-sm text-gray-600">CLSM</label>
                                          <a href="{{ asset('storage/'.$storing_test->clsm) }}" download="clsm_image">
                                            <img src="{{ asset('storage/'.$storing_test->clsm) }}" alt="" style="max-width: 200px; max-height: 200px;">
                                          </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
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
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $antibacteria_test->bacteria_detail->name }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="fruit_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $antibacteria_test->fruit_detail->name }}</div>
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="test_type" class="leading-7 text-sm text-gray-600">Test Type </label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $antibacteria_test->antibacteria_test_type->name }}</div>                                    
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="invivo_invitro" class="leading-7 text-sm text-gray-600">Invivo or Invitro (Yes or No)</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @if ( $antibacteria_test->invivo_invitro == 1)
                                                Invivo
                                              @else
                                                Invitro
                                              @endif
                                          </div>                                    
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                          <label for="bacteria_concentration" class="leading-7 text-sm text-gray-600">Bacteria Concentration</label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $antibacteria_test->bacteria_concentration }}</div>                                    
                                      </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative"> 
                                          <label for="mic" class="leading-7 text-sm text-gray-600">MIC </label>
                                          <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $antibacteria_test->mic }}</div>                                    
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                                        
                                
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.search.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
                              






                            