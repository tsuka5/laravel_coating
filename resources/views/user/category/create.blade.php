


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Experiment Data
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                          @if($categoryType == 'material')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'material']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Material</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>
                              
                          @elseif($categoryType == 'bacteria')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'bacteria']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Bacteria</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>
                              
                          @elseif($categoryType == 'fruit')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'fruit']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Fruit</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>
                              
                          @elseif($categoryType == 'phMaterial')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'ph_material']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add pH Material</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>
                              
                          @elseif($categoryType == 'antibacteriaTestType')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'test_type']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add antibacteria Test Type</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>
                    

                          @elseif($categoryType == 'solvent')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'solvent']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Solvent</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>

                          @elseif($categoryType == 'enzyme')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'enzyme']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Enzyme</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>

                          @elseif($categoryType == 'substrate')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'substrate']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Substrate</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>

                          @elseif($categoryType == 'gas')
                          <form method="post" action="{{ route('user.category.store', ['formType'=>'gas']) }}">
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Gas</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <textarea id="charactaristic" name="charactaristic" value="{{ old('charactaristic') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  maxlength="1000" rows="7" cols="20"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.category.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                                </div>
                            </div>
                          </form>
                          @endif

                                               
                                
                          {{-- <div class="p-2 w-full flex justify-around mt-4">
                              <button type="button" onclick="location.href='{{ route('user.category.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                          </div> --}}
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
                              






                            