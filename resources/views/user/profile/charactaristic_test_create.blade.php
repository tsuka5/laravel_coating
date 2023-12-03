<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Register Experiment Charactaristic Test
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <section class="text-gray-600 body-font relative">

                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-4 mt-4">
                              <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Charactaristic Test</h4>
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
                                            <input type="number" id="ph" name="ph" value="{{ old('ph') }}" step="0.1" placeholder="Enter pH value.(ex: 6.0)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                            <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate (1/s) </label>
                                            <input type="number" id="shear_rate" name="shear_rate" value="{{ old('shear_rate') }}" step="111.1" placeholder="Enter Sear Rate value.(ex: 10)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>

                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative"> 
                                            <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress (Pa・s)</label>
                                            <input type="number" id="shear_stress" name="shear_stress" value="{{ old('shear_stress') }}" step="1111.11" placeholder="Enter Shear stress value.(ex: 2563.24)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                            <label for="viscosity_tem" class="leading-7 text-sm text-gray-600">Viscosity temperature (℃)</label>
                                            <input type="number" id="viscosity_tem" name="viscosity_tem" value="{{ old('viscosity_tem') }}" step="111.1" placeholder="Enter temperature value.(ex: 25)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                            <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity (cP)</label>
                                            <input type="number" id="viscosity" name="viscosity" value="{{ old('viscosity') }}" step="111.1" placeholder="Enter viscosity value.(ex: 123.2)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                            <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness (mm)</label>
                                            <input type="number" id="thickness" name="thickness" value="{{ old('thickness') }}" step="0.001" placeholder="Enter thickness value.(ex: 0.065)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                        <label for="contact_angle" class="leading-7 text-sm text-gray-600">Contact Angle  (°)</label>
                                        
                                        <input type="number" id="contact_angle" name="contact_angle" value="{{ old('contact_angle') }}" step="0.01"placeholder="Enter CA value.(ex: 40)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                        <label for="tensile_strength" class="leading-7 text-sm text-gray-600">Tensile Strength (MPa)</label>
                                        <input type="number" id="tensile_strength" name="tensile_strength" value="{{ old('tensile_strength') }}" step="0.01"placeholder="Enter TS value.(ex: 40)"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                            <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content (％)</label>
                                            <input type="number" id="moisture_content" name="moisture_content" value="{{ old('moisture_content') }}" step="0.01" placeholder="Enter MC value. (ex:30)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                            <label for="water_solubility" class="leading-7 text-sm text-gray-600">Water Solubility  (％)</label>
                                            <input type="number" id="water_solubility" name="water_solubility" value="{{ old('water_solubility') }}" step="0.01" placeholder="Enter WS value. (ex:30)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative">
                                            <label for="wvp" class="leading-7 text-sm text-gray-600">Water Vapor Permeabilty 　(g・mm/(m^2・day・kPa))</label>
                                            <input type="number" id="wvp" name="wvp" value="{{ old('wvp') }}" step=0.01 placeholder="Enter WVP value. (ex:25.8)" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap">
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative mb-4">
                                          <label for="afm1" class="leading-7 text-sm text-gray-600">AFM</label>
                                          <input type="file" id="afm1" name="afm1" value="{{ old('afm1') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                          <input type="file" id="afm2" name="afm2" value="{{ old('afm2') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative mb-4">
                                          <label for="sem1" class="leading-7 text-sm text-gray-600">SEM</label>
                                          <input type="file" id="sem1" name="sem1" value="{{ old('sem1') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                          <input type="file" id="sem2" name="sem2" value="{{ old('sem2') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative mb-4">
                                          <label for="dsc1" class="leading-7 text-sm text-gray-600">DSC</label>
                                          <input type="file" id="dsc1" name="dsc1" value="{{ old('dsc1') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                          <input type="file" id="dsc2" name="dsc2" value="{{ old('dsc2') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="relative mb-4">
                                          <label for="ftir1" class="leading-7 text-sm text-gray-600">FT-IR</label>
                                          <input type="file" id="ftir1" name="ftir1" value="{{ old('ftir1') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                          <input type="file" id="ftir2" name="ftir2" value="{{ old('ftir2') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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