<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Search
        </h2>
    </x-slot>
    
    <div class="lg:w-1/2 w-full px-4 mt-3 mb-3 mx-auto border-2 border-gray-400 bg-white rounded-lg">
        <div class="text-center m-3">
            <h1>Compare with Whole Data</h1>
        </div>
        <div class="flex justify-center mb-3 border-2 border-gray-400 lg:w-2/3 md:w-full mx-auto rounded-lg">

            <div class="lg:w-2/3 md:w-full mx-auto flex flex-wrap">
                <div class="w-1/2">
                    <div class="flex justify-center">
                        <button class="w-full p-2 m-2 text-white bg-blue-500 border-0 focus:outline-none
                            hover:bg-blue-600 rounded">Film Condition</button>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="flex justify-center">
                        <button class="w-full p-2 m-2 text-white bg-blue-500 border-0 focus:outline-none
                            hover:bg-blue-600 rounded">Characteristic Test</button>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="flex justify-center">
                        <button class="w-full p-2 m-2 text-white bg-blue-500 border-0 focus:outline-none
                            hover:bg-blue-600 rounded">Storing Test</button>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="flex justify-center">
                        <button class="w-full p-2 m-2 text-white bg-blue-500 border-0 focus:outline-none
                            hover:bg-blue-600 rounded">Antibacteria Test</button>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="location.href='{{ route('user.compareWholeData', ['type' => 'characteristic_test', 'item' => 'ph'])}}'" class="p-2 m-2 text-white bg-blue-500 border-0 focus:outline-none
        hover:bg-blue-600 rounded">
            pH
        </button>
    </div>

    <div class="lg:w-1/2 w-full px-4 mt-3 mb-3 mx-auto border-2 border-gray-400 bg-white rounded-lg">

        <div class="text-center mt-3 mb-2">
            <h1>Search Expeiment</h1>
        </div>
        <div class="p-3 flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center items-end md:justify-center">
        <form action="{{ route('user.search.index') }}" method="GET">
            <div class = "flex-col justify-start">
                <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2 mb-4">
                    <label for="footer-field" class="leading-7 text-sm text-gray-600">Key words</label>
                    <input type="text" name="keyword" value="{{ $keyword }}" class="w-full bg-gray-100 bg-opacity-50 rounded border
                     border-gray-300 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none
                      text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
        
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Category</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Options</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        <td class="px-4 py-3">Materials</td>
                        <td class="px-4 py-3">
                            <select name="material" data-toggle="select">
                                <option value="">Select</option>
                                @foreach ($materials_list as $selected_material)
                                <option value="{{ $selected_material->material_detail->name }}"> {{ $selected_material->material_detail->name }}</option>
                                @endforeach
                            </select>   
                        </td> 
                    </tr>
                    <tr>
                        <td class="px-4 py-3">Bacteria</td>
                        <td class="px-4 py-3">
                            <select name="bacterium" data-toggle="select">
                                <option value="">Select</option>
                                @foreach ($bacteria_list as $selected_bacterium)
                                <option value="{{ $selected_bacterium->bacteria_detail->name }}"> {{ $selected_bacterium->bacteria_detail->name }}</option>
                                @endforeach
                            </select>                    
                        </td> 
                    </tr>
                    <tr>
                        <td class="px-4 py-3">Fruit and Vegitable</td>
                        <td class="px-4 py-3">
                            <select name="fruit" data-toggle="select">
                                <option value="">Select</option>
                                @foreach ($fruits_list as $selected_fruit)
                                <option value="{{ $selected_fruit->fruit_detail->name }}"> {{ $selected_fruit->fruit_detail->name }}</option>
                                @endforeach
                            </select>                    
          
                        </td> 
                    </tr>
                    <tr>
                        <td class="px-4 py-3">pH Materials</td>
                        <td class="px-4 py-3">
                            <select name="ph_material" data-toggle="select">
                                <option value="">Select</option>
                                @foreach ($phMaterial_list as $selected_phMaterial)
                                @if ($selected_phMaterial && $selected_phMaterial->ph_material_detail)
                                    <option value="{{ $selected_phMaterial->ph_material_detail->name }}"> {{ $selected_phMaterial->ph_material_detail->name }}</option>
                                @endif
                                @endforeach
                            </select>                    
                        </td> 
                    </tr>
                    <tr>
                        <td class="px-4 py-3">Antibacteria Test Type</td>
                        <td class="px-4 py-3">
                            <select name="antibacteria_test_type" data-toggle="select">
                                <option value="">Select</option>
                                @foreach ($antibacteriaTypeTest_list as $selected_antibacteriaTypeTest)
                                <option value="{{ $selected_antibacteriaTypeTest->antibacteria_test_type->name }}"> {{ $selected_antibacteriaTypeTest->antibacteria_test_type->name }}</option>
                                @endforeach
                            </select>                            
                        </td> 
                    </tr>
                  

                </tbody>
              </table>
                <div class="flex justify-center">
                    <input type="submit" value="Search" class="lg:mt-2 xl:mt-4 flex-shrink-0 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                </div>
            </div>
        </form>
        </div>
    </div>
    {{-- {{dd($selected_experiments)}} --}}
    @if(!empty($selected_experiments))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                    
                        <div class="container px-5 mx-auto ">
                            <x-flash-message status="session('status')" />
                            {{ $selected_experiments->links()}}    
                        <div class="w-full mx-auto overflow-auto border-2 border-gray-400 bg-white rounded-lg">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-gray-400 border w-1/5 text-center">Experiment_Title</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-gray-400 border w-1/3 text-center">Composition</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-gray-400 border w-1/5 text-center">Fruit or Vesitable</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-gray-400 border w-1/6 text-center">Bacteria</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium bg-gray-400"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-400">
                                    @foreach ($selected_experiments as $experiment)
                                        <tr>
                                            <td class="px-4 py-3 border text-center">
                                                    <p  style="word-wrap: break-word; max-width: 100%;">
                                                        {{$experiment->title}}
                                                    </p>
                                            </td>
                                            <td class="px-4 py-3 border text-center">
                                                @foreach($materials[$experiment->id] as $material)
                                                    <p  style="word-wrap: break-word; max-width: 100%;">
                                                        {{$material->material_detail->name}} : {{($material->concentration)}}
                                                    </p>
                                                @endforeach
                                            </td>
                                            <td class="px-4 py-3 border text-center">
                                                @foreach($fruits[$experiment->id] as $fruit)
                                                <p  style="word-wrap: break-word; max-width: 100%;">
                                                    {{$fruit->fruit_detail->name}} <br> 
                                                </p>
                                                @break
                                                @endforeach
                                            </td>
                                            <td class="px-4 py-3 border text-center">
                                                @foreach($bacteria[$experiment->id] as $bacterium)
                                                <p style="word-wrap: break-word; max-width: 100%;">
                                                    {{$bacterium->bacteria_detail->name}} <br> 
                                                </p>
                                                @endforeach
                                            </td>
                                                        
                                            <td class="px-4 py-3 border text-center">
                                                <div class="flex justify-center">
                                                    <button onclick="location.href='{{ route('user.experiment_show', ['experiment_id' => $experiment->id])}}'" class="text-white
                                                        bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Detail</button>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                    </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div> 
    @endif
</x-app-layout>
