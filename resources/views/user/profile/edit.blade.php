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

                            {{-- experimentのEdit --}}
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

                              
                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Materials</h4>
                              </div>

                             
                              @foreach ($materials as $material)
                             

                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="m_name" class="leading-7 text-sm text-gray-600">Name</label>
                                    <input type="text" name="m_name[{{ $material->id }}]" value="{{ $material->m_name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="m_name">
                                </div>
                              </div>
            
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                                      <input type="number" name="price[{{ $material->id }}]" value="{{ $material->price }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="price">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                                      <input type="number" name="concentration[{{ $material->id }}]" value="{{ $material->concentration }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="concentration">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="heat" class="leading-7 text-sm text-gray-600">Heat</label>
                                      <input type="number" name="heat[{{ $material->id }}]" value="{{ $material->heat }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="heat">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="water_temperature" class="leading-7 text-sm text-gray-600">Water Temperature</label>
                                      <input type="number" name="water_temperature[{{ $material->id }}]" value="{{ $material->water_temperature }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="water_temperature">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="material_rate" class="leading-7 text-sm text-gray-600">Material Rate</label>
                                      <input type="number" name="material_rate[{{ $material->id }}]" value="{{ $material->material_rate }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="material_rate" >
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="starler_speed" class="leading-7 text-sm text-gray-600">Starler Speed</label>
                                      <input type="number" name="starler_speed[{{ $material->id }}]" value="{{ $material->starler_speed }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="starler_speed">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="repeat" class="leading-7 text-sm text-gray-600">Rpeat</label>
                                      <input type="number" name="repeat[{{ $material->id }}]" value="{{ $material->repeat }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="repeat">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="staler_time" class="leading-7 text-sm text-gray-600">Staler Time</label>
                                      <input type="number" name="staler_time[{{ $material->id }}]" value="{{ $material->staler_time }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="staler_time">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">pH Adjustment</label>
                                      <input type="number" name="ph_adjustment[{{ $material->id }}]" value="{{ $material->ph_adjustment }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="ph_adjustment">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="ph_material" class="leading-7 text-sm text-gray-600">pH Material </label>
                                      <input type="number" name="ph_material[{{ $material->id }}]" value="{{ $material->ph_material }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="ph_material">
                                  </div>
                              </div>
              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="ph_target" class="leading-7 text-sm text-gray-600">pH target</label>
                                      <input type="number" name="ph_target[{{ $material->id }}]" value="{{ $material->ph_target }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                          id="ph_target">
                                  </div>
                              </div> 
                              @endforeach


                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Additive</h4>
                              </div>

                            @foreach($additives as $additive)

                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="ad_name" class="leading-7 text-sm text-gray-600">Name</label>
                                  <input type="text" name="ad_name[{{ $additive->id }}]" value="{{ $additive->ad_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                      id="ad_name">
                              </div>
                            </div>
          
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                                  <input type="number" name="price[{{ $additive->id }}]" value="{{ $additive->price }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                      id="price">
                              </div>
                            </div>
          
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                                  <input type="number" name="concentration[{{ $additive->id }}]" value="{{ $additive->concentration }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                      id="concentration">
                              </div>
                            </div>

                            @endforeach
                            

                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Conditions</h4>
                            </div>
                              
                            @foreach ($film_conditions as $film_condition)

                            <div class="m-2">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="degassing_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature<br>(脱気温度) ℃</label>
                                      <input type="number" id="degassing_temperature" name="degassing_temperature[{{ $film_condition->id }}]" value="{{ $film_condition->degassing_temperature }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                      <label for="dish_type" class="leading-7 text-sm text-gray-600">Dish Type(ペトリ皿のタイプ)</label>
                                      <input type="text" id="dish_type" name="dish_type[{{ $film_condition->id }}]" value="{{ $film_condition->dish_type }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative"> 
                                      <label for="dish_area" class="leading-7 text-sm text-gray-600">Dish Area<br>(ペトリ皿の表面積) cm^2</label>
                                      <input type="number" id="dish_area" name="dish_area[{{ $film_condition->id }}]" value="{{ $film_condition->dish_area }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="casting_ml" class="leading-7 text-sm text-gray-600">Casting(キャスティング量) ml</label>
                                      <input type="number" id="casting_ml" name="casting_ml[{{ $film_condition->id }}]" value="{{ $film_condition->casting_ml }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="incubator_type" class="leading-7 text-sm text-gray-600">Incubator Type<br>(インキュベータの種類)</label>
                                      <input type="text" id="incubator_type" name="incubator_type[{{ $film_condition->id }}]" value="{{ $film_condition->incubator_type }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature<br>(乾燥温度) ℃</label>
                                      <input type="number" id="drying_temperature" name="drying_temperature[{{ $film_condition->id }}]" value="{{ $film_condition->drying_temperature }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity<br>(乾燥温度) %RH</label>
                                      <input type="number" id="drying_humidity" name="drying_humidity[{{ $film_condition->id }}]" value="{{ $film_condition->drying_humidity }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time(乾燥時間) h</label>
                                      <input type="number" id="drying_time" name="drying_time[{{ $film_condition->id }}]" value="{{ $film_condition->drying_time }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                            </div>

                            @endforeach
                          
                              <div class="flex flex-col text-center w-full mb-4 mt-12">
                                  <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Charactaristic Test</h4>
                              </div>

                              @foreach ($charactaristic_tests as $charactaristic_test)
                              <div class="m-2">
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="ph" class="leading-7 text-sm text-gray-600">ph </label>
                                        <input type="number" id="ph" name="ph[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->ph }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate(せん断速度)</label>
                                        <input type="number" id="shear_rate" name="shear_rate[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->shear_rate }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative"> 
                                        <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress(せん断応力) </label>
                                        <input type="number" id="shear_stress" name="shear_stress[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->shear_stress }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity(粘度)</label>
                                        <input type="number" id="viscosity" name="viscosity[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->viscosity }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content(含水量)</label>
                                        <input type="number" id="moisture_content" name="moisture_content[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->moisture_content }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="water_solubility" class="leading-7 text-sm text-gray-600">Water Solubility(溶解度)</label>
                                        <input type="number" id="water_solubility" name="water_solubility[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->water_solubility }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="wvp" class="leading-7 text-sm text-gray-600">WVP(水蒸気透過性)</label>
                                        <input type="number" id="wvp" name="wvp[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->wvp }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness(厚さ) mm</label>
                                        <input type="number" id="thickness" name="thickness[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->thickness }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="contact_angle" class="leading-7 text-sm text-gray-600">Contact Angle(接触角) ℃</label>
                                      <input type="number" id="contact_angle" name="contact_angle[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->contact_angle }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                      <label for="tensile_strength" class="leading-7 text-sm text-gray-600">Tensile Strength(引張強度)</label>
                                      <input type="number" id="tensile_strength" name="tensile_strength[{{ $charactaristic_test->id }}]" value="{{ $charactaristic_test->tensile_strength }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                              </div>
                              @endforeach


                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                          </div>
                          @foreach ($storing_tests as $storing_test)
                          <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="s_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                    <input type="text" id="s_name" name="s_name[{{ $storing_test->id}}]" value="{{ $storing_test->s_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="storing_days" class="leading-7 text-sm text-gray-600">Storing days</label>
                                    <input type="number" id="storing_days" name="storing_days[{{ $storing_test->id}}]" value="{{ $storing_test->storing_days }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative"> 
                                    <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate </label>
                                    <input type="number" id="mass_loss_rate" name="mass_loss_rate[{{ $storing_test->id}}]" value="{{ $storing_test->mass_loss_rate }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="color_l" class="leading-7 text-sm text-gray-600">*L</label>
                                    <input type="number" id="color_l" name="color_l[{{ $storing_test->id}}]" value="{{ $storing_test->color_l }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="color_a" class="leading-7 text-sm text-gray-600">*b</label>
                                    <input type="number" id="color_a" name="color_a[{{ $storing_test->id}}]" value="{{ $storing_test->color_a }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="color_b" class="leading-7 text-sm text-gray-600">*b</label>
                                  <input type="number" id="color_b" name="color_b[{{ $storing_test->id}}]" value="{{ $storing_test->color_b }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="color_e" class="leading-7 text-sm text-gray-600">⊿*E</label>
                                    <input type="number" id="color_e" name="color_e[{{ $storing_test->id}}]" value="{{ $storing_test->color_e }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                                  <input type="number" id="tss" name="tss[{{ $storing_test->id}}]" value="{{ $storing_test->tss }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness</label>
                                  <input type="number" id="hardness" name="hardness[{{ $storing_test->id}}]" value="{{ $storing_test->hardness }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                          </div>
                          @endforeach


                          <div class="flex flex-col text-center w-full mb-4 mt-12">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Antibacteria Test</h4>
                        </div>
                        @foreach ($antibacteria_tests as $antibacteria_test)
                        <div class="m-2">
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="a_name" class="leading-7 text-sm text-gray-600">Bacteria Name </label>
                                  <input type="text" id="a_name" name="a_name[{{ $antibacteria_test->id }}]" value="{{ $antibacteria_test->a_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                  <label for="bacteria_rate" class="leading-7 text-sm text-gray-600">Bacteria Rate</label>
                                  <input type="number" id="bacteria_rate" name="bacteria_rate[{{ $antibacteria_test->id }}]" value="{{ $experiment->antibacteria_test->bacteria_rate }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative"> 
                                  <label for="a_moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content </label>
                                  <input type="number" id="a_moisture_content" name="a_moisture_content[{{ $antibacteria_test->id }}]" value="{{ $experiment->antibacteria_test->a_moisture_content }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                  <input type="file" id="afm" name="afm[{{ $antibacteria_test->id }}]" value="{{ $antibacteria_test->afm }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                  <input type="file" id="sem" name="sem[{{ $antibacteria_test->id }}]" value="{{ $antibacteria_test->sem }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                <input type="file" id="dsc" name="dsc[{{ $antibacteria_test->id }}]" value="{{ $antibacteria_test->dsc }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="ftir" class="leading-7 text-sm text-gray-600">FTIR</label>
                                  <input type="file" id="ftir" name="ftir[{{ $antibacteria_test->id }}]" value="{{ $antibacteria_test->ftir }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                        </div>
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
