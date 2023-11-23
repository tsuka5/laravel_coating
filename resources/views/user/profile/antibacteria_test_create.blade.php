<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Register Experiment Antibacteria Test
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  <section class="text-gray-600 body-font relative">

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
                                        <label for="a_name" class="leading-7 text-sm text-gray-600">Microbial Name </label>
                                        <select name="a_name" data-toggle="select" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                          <option value="">Select microbial</option>
                                          @foreach ($bacteria_list as $selected_bacterium)
                                          <option value="{{ $selected_bacterium->name }}"> {{ $selected_bacterium->name }}</option>
                                          @endforeach
                                        </select>                                      
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="bacteria_rate" class="leading-7 text-sm text-gray-600">Bacteria Rate</label>
                                        <input type="number" id="bacteria_rate" name="bacteria_rate" step="0.01" placeholder="Enter bacteria rate."value="{{ old('bacteria_rate') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-1/2 mx-auto">
                                      <div class="relative">
                                        <label for="mic" class="leading-7 text-sm text-gray-600">MIC </label>
                                        <input type="mic" id="mic" name="mic" value="{{ old('mic') }}" step="0.01"placeholder="Enter MIC." class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                  </section>
              </div>
          </div>
      </div>
  </div>

</x-app-layout>