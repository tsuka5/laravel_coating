


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
                          @if($category_type == 'material')
                          <form method="post" enctype="multipart/form-data" action="{{ route('user.category.update', ['id' => $->id]) }}">
                            @method('PUT')  
                            @csrf
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Material</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $material->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $material->charactaristic }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              
                          @elseif($category_type == 'bacteria')
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Bacteria</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $bacteria->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $bacteria->charactaristic }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              
                          @elseif($category_type == 'fruit')
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Fruit</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $fruit->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $fruit->charactaristic }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              
                          @elseif($category_type == 'phMaterial')
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">pH Material</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $phMaterial->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $phMaterial->charactaristic }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              
                          @elseif($category_type == 'antibacteriaTestType')
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Antibacteria Test Type</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $antibacteriaTestType->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                                <label for="charactaristic" class="leading-7 text-sm text-gray-600">Charactaristic</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $antibacteriaTestType->charactaristic }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endif
                                               
                                
                          <div class="p-2 w-full flex justify-around mt-4">
                              <button type="button" onclick="location.href='{{ route('user.category.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                          </div>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
                              






                            