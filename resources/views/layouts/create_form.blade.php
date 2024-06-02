@if($formType == 'material')
  <div class="container px-5 mx-auto">
      <div class="flex flex-col text-center w-full mb-4 mt-4">
        <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Material</h4>
      </div>
      <div class="lg:w-2/3 md:w-2/3 mx-auto">
        <x-input-error :messages="$errors->all()" class="mb-4"  />
        <form method="post" action="{{ route('user.store', ['id'=>$id, 'formType'=>'material', 'experiment_id'=>$experiment->id]) }}">
          @csrf

          <div class="m-2">
          <div class="flex flex-wrap">
            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="material_name" class="leading-7 text-sm text-gray-600">Material Name</label>
                <select id="material_name" name="material_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                  focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <option value="">Select material</option>
                  @foreach ($materials_list as $selected_material)
                  <option value="{{ $selected_material->name }}"> {{ $selected_material->name }}</option>
                  @endforeach
                </select>                    
              </div>
            </div>
           
            <p class="text-red-500">If you don't see the material in this list, please add it here</p>
            <div class="p-2 w-full flex justify-around">
              <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'material']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
            </div>


            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="solvent_name" class="leading-7 text-sm text-gray-600">Solvent Name</label>
                <select id="solvent_name" name="solvent_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500
                  focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <option value="">Select solvent</option>
                  @foreach ($solvents_list as $selected_solvent)
                  <option value="{{ $selected_solvent->name }}"> {{ $selected_solvent->name }}</option>
                  @endforeach
                </select>                    
              </div>
            </div>
           
            <p class="text-red-500">If you don't see the solvent in this list, please add it here</p>
            <div class="p-2 w-full flex justify-around">
              <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'material']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
            </div>

            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="solvent_concentration" class="leading-7 text-sm text-gray-600">Solvent Concentration (% (w/w))</label>
                <input id="solvent_concentration" type="number" name="solvent_concentration" value="{{ old('solvent_concentration') }}" step="0.01" placeholder="ex: 0.80" required class="w-full bg-gray-100 bg-opacity-50 rounded border
                  border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>

            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="concentration" class="leading-7 text-sm text-gray-600">The Percentage of Material in the Solvent (% (w/w))</label>
                <input id="concentration" type="number" name="concentration" value="{{ old('concentration') }}" step="0.01" placeholder="ex: 0.80" required class="w-full bg-gray-100 bg-opacity-50 rounded border
                  border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>

            
            </div>
           
            
            
          
            <div class="p-2 w-full flex justify-around mt-4">
              {{-- <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button> --}}
              <button type="submit" class="text-white p-2 w-full flex justify-around mt-4-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
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
    <div class="lg:w-2/3 md:w-2/3 mx-auto">
      <x-input-error :messages="$errors->all()" class="mb-4"  />
        <form method="post" action="{{ route('user.store', ['id'=>$id, 'formType'=>'film_condition', 'experiment_id'=>$experiment->id]) }}">
          @csrf

          <div class="m-2">
          <div class="flex flex-wrap">
            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="casting_amount" class="leading-7 text-sm text-gray-600">Casting amount (ml)</label>
                <input id="casting_amount" type="number" name="casting_amount" value="{{ old('casting_amount') }}" step="0.1"placeholder="ex: 20" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
          </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="petri_dish_aria" class="leading-7 text-sm text-gray-600">Petri Dish Aria (cm^2)</label>
                  <input id="petri_dish_aria" type="number" name="petri_dish_area" value="{{ old('petri_dish_area') }}"placeholder="ex: 24" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative"> 
                  <label for="degasting_temperature" class="leading-7 text-sm text-gray-600">Degasting Temperature (℃)</label>
                  <input id="degasting_temperature" type="number" name="degas_temperature" value="{{ old('degas_temperature') }}" step="0.01"placeholder="ex: 24.3" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature (℃)</label>
                  <input id="drying_temperature" type="number" name="drying_temperature" value="{{ old('drying_temperature') }}" placeholder="ex: 60.8" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity (%RH)</label>
                  <input id="drying_humidity" type="number" name="drying_humidity" value="{{ old('drying_humidity') }}" step="0.1" placeholder="ex: 80" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time (h)</label>
                  <input id="drying_time" type="number" name="drying_time" value="{{ old('drying_time') }}" step="0.1" placeholder="ex: 24" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
        </div>
      </div>
      
      <div class="p-2 w-full flex justify-around mt-4">
        {{-- <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button> --}}
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
    <div class="lg:w-2/3 md:w-2/3 mx-auto">
      <x-input-error :messages="$errors->all()" class="mb-4"  />
        <form method="post" enctype="multipart/form-data" action="{{ route('user.store', ['id'=>$id, 'formType'=>'charactaristic_test', 'experiment_id'=>$experiment->id]) }}">
          @csrf

    
        <div class="m-2">
            <div class="flex flex-wrap">
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="ph" class="leading-7 text-sm text-gray-600">pH </label>
                    <input id="ph" type="number" name="ph" value="{{ old('ph') }}" step="0.01" placeholder="ex: 6.0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="temperature" class="leading-7 text-sm text-gray-600">Temperature (℃) </label>
                    <input id="temperature" type="number" name="temperature" value="{{ old('temperature') }}" step="0.1" placeholder="ex: 23" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate (1/s) </label>
                    <input id="shear_rate" type="number" name="shear_rate" value="{{ old('shear_rate') }}" step="0.1" placeholder="ex: 10" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative"> 
                    <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress (Pa・s)</label>
                    <input id="shear_stress" type="number" name="shear_stress" value="{{ old('shear_stress') }}" step="0.01" placeholder="ex: 2563.24" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="rotation_speed" class="leading-7 text-sm text-gray-600">Rotation Speed (rpm)</label>
                    <input id="rotation_speed" type="number" name="rotation_speed" value="{{ old('rotation_speed') }}" step="0.1" placeholder="ex: 1000" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity (cP)</label>
                    <input id="viscosity" type="number" name="viscosity" value="{{ old('viscosity') }}" step="0.1" placeholder="ex: 123.2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="mc" class="leading-7 text-sm text-gray-600">Moisture Content (％)</label>
                    <input id="mc" type="number" name="mc" value="{{ old('mc') }}" step="0.01" placeholder="ex:30" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>                                    
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="ws" class="leading-7 text-sm text-gray-600">Water Solubility  (％)</label>
                    <input id="ws" type="number" name="ws" value="{{ old('ws') }}" step="0.01" placeholder="ex:30" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="wvp" class="leading-7 text-sm text-gray-600">Water Vapor Permeabilty (g・mm/(m^2・day・kPa))</label>
                    <input id="wvp" type="number" name="wvp" value="{{ old('wvp') }}" step=0.001 placeholder="ex:25.8" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                    <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness (mm)</label>
                    <input id="thickness" type="number" name="thickness" value="{{ old('thickness') }}" step="0.001" placeholder="ex: 0.065" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                <label for="ca" class="leading-7 text-sm text-gray-600">Contact Angle  (°)</label>
                <input id="ca" type="number" name="ca" value="{{ old('ca') }}" step="0.01"placeholder="ex: 40" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                <label for="ts" class="leading-7 text-sm text-gray-600">Tensile Strength (MPa)</label>
                <input id="ts" type="number" name="ts" value="{{ old('ts') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                <label for="d43" class="leading-7 text-sm text-gray-600">D43 (mm)</label>
                <input id="d43" type="number" name="d43" value="{{ old('d43') }}" step="0.0001"placeholder="ex: 0.0001"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                <label for="d32" class="leading-7 text-sm text-gray-600">D32 (mm)</label>
                <input id="d32" type="number" name="d32" value="{{ old('d32') }}" step="0.0001"placeholder="ex: 0.0001"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                <label for="eab" class="leading-7 text-sm text-gray-600">EAB (%)</label>
                <input id="eab" type="number" name="eab" value="{{ old('eab') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                <label for="light_transmittance" class="leading-7 text-sm text-gray-600">Light Trancemittance (%)</label>
                <input id="light_transmittance" type="number" name="light_transmittance" value="{{ old('light_transmittance') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                <label for="xrd" class="leading-7 text-sm text-gray-600">XRD (nm)</label>
                <input id="xrd" type="number" name="xrd" value="{{ old('xrd') }}" step="0.01"placeholder="ex: 40"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
          </div>
            <div class="flex flex-wrap">
                <div class="p-2 mx-auto">
                    <div class="relative mb-4">
                        <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                        <input id="afm" type="file" name="afm" value="{{ old('afm') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                
                <div class="p-2 mx-auto">
                    <div class="relative mb-4">
                        <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                        <input id="sem" type="file" name="sem" value="{{ old('sem') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
          
            <div class="p-2 mx-auto">
                <div class="relative mb-4">
                  <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                  <input id="dsc" type="file" name="dsc" value="{{ old('dsc') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            
            <div class="p-2 mx-auto">
                <div class="relative mb-4">
                  <label for="ftir" class="leading-7 text-sm text-gray-600">FT-IR</label>
                  <input id="ftir" type="file" name="ftir" value="{{ old('ftir') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            
            <div class="p-2 mx-auto">
                <div class="relative mb-4">
                  <label for="clsm" class="leading-7 text-sm text-gray-600">CLSM</label>
                  <input id="clsm" type="file" name="clsm" value="{{ old('clsm') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            
        </div>

    </div>
      
      <div class="p-2 w-full flex justify-around mt-4">
        {{-- <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button> --}}
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
    <div class="lg:w-2/3 md:w-2/3 mx-auto">
      <x-input-error :messages="$errors->all()" class="mb-4"  />
        <form method="post" enctype="multipart/form-data" action="{{ route('user.store', ['id'=>$id, 'formType'=>'storing_test', 'experiment_id'=>$experiment->id]) }}">
          @csrf
          {{-- {{dd($experiment)}} --}}
          <div class="m-2">
          <div class="flex flex-wrap">
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                  <select name="fruit_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($fruits_list as $selected_fruit)
                    <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                    @endforeach
                  </select>                                      
              </div>
            </div>
            <p class="text-red-500">If you don't see the fruit or vegitable in this list, please add it here.</p>
            <div class="p-2 w-full flex justify-around">
              <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'fruit']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="storing_days" class="leading-7 text-sm text-gray-600">Storing days (days)</label>
                  <input id="storing_days" type="number" name="storing_day" value="{{ old('storing_day') }}" placeholder="ex: 3" required step="0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="storing_temperature" class="leading-7 text-sm text-gray-600">Storing temperature  (℃)</label>
                  <input id="storing_temperature" type="number" name="storing_temperature" value="{{ old('storing_temperature') }}" placeholder="ex: 15" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="storing_humidity" class="leading-7 text-sm text-gray-600">Storing humidity  (%RH)</label>
                  <input id="storing_humidity" type="number" name="storing_humidity" value="{{ old('storing_humidity') }}" placeholder="ex: 45.9" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="memo" class="leading-7 text-sm text-gray-600">memo </label>
                  <input id="memo" type="text" name="memo" value="{{ old('memo') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            {{-- <div class="p-2 mx-auto">
              <div class="relative"> 
                  <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate (%)</label>
                  <input id="mass_loss_rate" type="number" name="mass_loss_rate" value="{{ old('mass_loss_rate') }}"placeholder="ex: 3" step="0.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="l" class="leading-7 text-sm text-gray-600">L*</label>
                  <input id="l" type="number" name="l" value="{{ old('l') }}" step=0.01 placeholder="ex: 28.6" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="a" class="leading-7 text-sm text-gray-600">a*</label>
                  <input id="a" type="number" name="a" value="{{ old('a') }}" step="0.01" placeholder="ex: 34.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="b" class="leading-7 text-sm text-gray-600">b*</label>
                <input id=b type="number" name="b" value="{{ old('b') }}" step="0.01" placeholder="ex: 19.0" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="e" class="leading-7 text-sm text-gray-600">⊿E</label>
                  <input id="e" type="number" name="e" value="{{ old('e') }}" step="0.1" placeholder="ex: 29.1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                  <input id="ph" type="number" name="ph" value="{{ old('ph') }}" step="0.01" placeholder="ex: 6.5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                <input id="tss" type="number" name="tss" value="{{ old('tss') }}" step="0.001" placeholder="ex: 8.8" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness (N)</label>
                <input id="hardness" type="number" name="hardness" value="{{ old('hardness') }}" step="0.001" placeholder="ex: 0.10" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content (%)</label>
                  <input id="moisture_content" type="number" name="moisture_content" step="0.1" placeholder="ex: 40" value="{{ old('moisture_content') }}" step="0.01" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="ta" class="leading-7 text-sm text-gray-600">TA (%)</label>
                  <input id="ta" type="number" name="ta" step="0.1" placeholder="ex: 3.0" value="{{ old('ta') }}" step="0.001" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="vitamin_c" class="leading-7 text-sm text-gray-600">Vitamin C (%)</label>
                <input id="vitamin_c" type="number" name="vitamin_c" value="{{ old('vitamin_c') }}" step="0.01" placeholder="ex: 6.5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                <label for="rr" class="leading-7 text-sm text-gray-600">RR (mgCO2/(kg・h))</label>
                <input id="rr" type="number" name="rr" value="{{ old('rr') }}" step="0.1" placeholder="ex: 2.5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative mb-4">
                  <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                  <input id="afm" type="file" name="afm" value="{{ old('afm') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative mb-4">
                  <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                  <input id="sem" type="file" name="sem" value="{{ old('sem') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative mb-4">
                  <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                  <input id="dsc" type="file" name="dsc" value="{{ old('dsc') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative mb-4">
                  <label for="ftir" class="leading-7 text-sm text-gray-600">FT-IR</label>
                  <input id="ftir" type="file" name="ftir" value="{{ old('ftir') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative mb-4">
                  <label for="clsm" class="leading-7 text-sm text-gray-600">CLSM</label>
                  <input id="clsm" type="file" name="clsm" value="{{ old('clsm') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div> --}}



        </div>
        </div>
          
      <div class="p-2 w-full flex justify-around mt-4">
        {{-- <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button> --}}
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
    <div class="mx-auto">
      <x-input-error :messages="$errors->all()" class="mb-4"  />
        <form id="antibacteria_test_form" method="post" action="{{ route('user.store', ['id'=>$id, 'formType'=>'antibacteria_test', 'experiment_id'=>$experiment->id]) }}">
          @csrf

          <div class="m-2">
          
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="bacteria_name" class="leading-7 text-sm text-gray-600">Bacteria Name  {{$experiment->id}}</label>
                  <select id="bacteria_name" name="bacteria_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($bacteria_list as $selected_bacterium)
                    <option value="{{ $selected_bacterium->name }}"> {{ $selected_bacterium->name }}</option>
                    @endforeach
                  </select>                                      
              </div>
            </div>
            <p class="text-red-500">If you don't see the bacteria in this list, please add it here.</p>
            <div class="p-2 w-full flex justify-around">
              <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'bacteria']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>                   
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="fruit_name" class="leading-7 text-sm text-gray-600">Fruit or Vegetable </label>
                  <select id="fruit_name" name="fruit_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($fruits_list as $selected_fruit)
                    <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                    @endforeach
                  </select>                                      
              </div>
            </div>
            <p class="text-red-500">If you don't see the fruit or vegitable in this list, please add it here.</p>
            <div class="p-2 w-full flex justify-around">
              <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'fruit']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="test_type" class="leading-7 text-sm text-gray-600">Test Type </label>
                  <select id="test_type" name="test_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach ($antibacteria_test_list as $selected_test)
                    <option value="{{ $selected_test->name }}"> {{ $selected_test->name }}</option>
                    @endforeach
                  </select>                                      
              </div>
            </div>
            <p class="text-red-500">If you don't see the test type in this list, please add it here.</p>
            <div class="p-2 w-full flex justify-around">
              <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'antibacteriaTestType']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="invivo_invitro" class="leading-7 text-sm text-gray-600">Invivo or Invitro</label>
                  <select id="invivo_invitro" name="invivo_invitro" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="1">Invivo</option>
                    <option value="0">Invitro</option>
                  </select>
              </div>
            </div>
            <div class="p-2 mx-auto">
              <div class="relative">
                  <label for="bacteria_concentration" class="leading-7 text-sm text-gray-600">Bacteria Concentration(CFU/mL)</label>
                  <input id="bacteria_concentration" type="number" name="bacteria_concentration" step="0.01" placeholder="ex: 91000"value="{{ old('bacteria_concentration') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 mx-auto">
                <div class="relative">
                  <label for="mic" class="leading-7 text-sm text-gray-600">MIC</label>
                  <input id="mic" type="mic" name="mic" value="{{ old('mic') }}" step="0.01" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
          </div>
          
      <div class="p-2 w-full flex justify-around mt-4">
        {{-- <button type="button" onclick="location.href='{{ route('user.profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button> --}}
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
                  <input id="img1" type="file" name="img1" value="{{ old('img1') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
