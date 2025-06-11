<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Category
        </h2>
    </x-slot>
    
        <div class="lg:w-2/3 w-full px-4 mt-3 mb-3 mx-auto border-2 border-gray-400 bg-white rounded-lg">
            <x-flash-message status="session('status')" />
            <div class="p-3 flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center">
                    <form action="{{ route('user.category.index') }}" method="GET">
                <div class = "flex-col justify-start">
                    <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2 mb-4">
                        <label for="footer-field" class="leading-7 text-sm text-gray-600">Key words</label>
                        <input type="text" name="keyword" value="{{ $keyword }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>


                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                          <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Category</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Options</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"></th>                            
                          </tr>
                        </thead>
                        <tbody>
                          
                            <tr>
                                <td class="px-4 py-3">Materials</td>
                                <td class="px-4 py-3">
                                    <select name="material" data-toggle="select">
                                        <option value="">Select</option>
                                        @foreach ($materials_list as $selected_material)
                                        <option value="{{ $selected_material->name }}"> {{ $selected_material->name }}</option>
                                        @endforeach
                                    </select>
                                </td> 
                                <td>
                                    <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'material']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Solvents</td>
                                <td class="px-4 py-3">
                                    <select name="enzyme" data-toggle="select">
                                        <option value="">Select</option>
                                        @foreach ($solvents_list as $selected_solvent)
                                        <option value="{{ $selected_solvent->name }}"> {{ $selected_solvent->name }}</option>
                                        @endforeach
                                    </select>
                                </td> 
                                <td>
                                    <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'solvent']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Bacteria</td>
                                <td class="px-4 py-3">
                                    <select name="bacterium" data-toggle="select">
                                        <option value="">Select</option>
                                        @foreach ($bacteria_list as $selected_bacterium)
                                        <option value="{{ $selected_bacterium->name }}"> {{ $selected_bacterium->name }}</option>
                                        @endforeach
                                    </select>                    
                                </td> 
                                <td>
                                    <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'bacteria']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>                   
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Fruit and Vegitable</td>
                                <td class="px-4 py-3">
                                    <select name="fruit" data-toggle="select">
                                        <option value="">Select</option>
                                        @foreach ($fruits_list as $selected_fruit)
                                        <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                                        @endforeach
                                    </select>                   
                                </td> 
                                <td>
                                    <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'fruit']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Enzymes</td>
                                <td class="px-4 py-3">
                                    <select name="emzyme" data-toggle="select">
                                        <option value="">Select</option>
                                        @foreach ($enzymes_list as $selected_enzyme)
                                        <option value="{{ $selected_enzyme->name }}"> {{ $selected_enzyme->name }}</option>
                                        @endforeach
                                    </select>
                                </td> 
                                <td>
                                    <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'enzyme']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Substrate</td>
                                <td class="px-4 py-3">
                                    <select name="substrate" data-toggle="select">
                                        <option value="">Select</option>
                                        @foreach ($substrates_list as $selected_substrate)
                                        <option value="{{ $selected_substrate->name }}"> {{ $selected_substrate->name }}</option>
                                        @endforeach
                                    </select>
                                </td> 
                                <td>
                                    <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'substrate']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Gas</td>
                                <td class="px-4 py-3">
                                    <select name="gas" data-toggle="select">
                                        <option value="">Select</option>
                                        @foreach ($gases_list as $selected_gas)
                                        <option value="{{ $selected_gas->name }}"> {{ $selected_gas->name }}</option>
                                        @endforeach
                                    </select>
                                </td> 
                                <td>
                                    <button type="button" onclick="location.href='{{ route('user.category.create', ['categoryType'=>'gas']) }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">Add</button>
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
    @if(empty($selected_materials) && empty($selected_solvents) && empty($selected_bacteria) && empty($selected_fruits) && empty($selected_enzymes) && empty($selected_substrates) && empty($selected_gases)) 
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                    
                        <div class="container px-5 mx-auto">
                            
                        <div class="w-full mx-auto overflow-auto border-2 border-gray-400 bg-white rounded-lg">
                            <table class="table-auto w-full text-left whitespace-no-wrap ">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-gray-400 border w-1/6 text-center">Category</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-gray-400 border w-1/6 text-center">Name</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-gray-400 border w-1/3 text-center">Characteristic</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selected_materials as $material)
                                    <tr>
                                        <td class="px-4 py-3 border w-1/6 text-center">Material</td>
                                        <td class="px-4 py-3 border w-1/6 text-center">{{ $material->name }}</td>
                                        <td class="px-4 py-3 border w-1/3 text-center">{{ $material->charactaristic }}</td>
                                       
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                @foreach ($selected_solvents as $solvent)
                                    <tr>
                                        <td class="px-4 py-3 border w-1/6 text-center">Solvent</td>
                                        <td class="px-4 py-3 border w-1/6 text-center">{{ $solvent->name }}</td>
                                        <td class="px-4 py-3 border w-1/3 text-center">{{ $solvent->charactaristic }}</td>
                                      
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                @foreach ($selected_bacteria as $bacterium)
                                    <tr>
                                        <td class="px-4 py-3 border w-1/6 text-center">Bacteria</td>
                                        <td class="px-4 py-3 border w-1/6 text-center">{{ $bacterium->name }}</td>
                                        <td class="px-4 py-3 border w-1/3 text-center">{{ $bacterium->charactaristic }}</td>
                                       
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                @foreach ($selected_fruits as $fruit)
                                    <tr>
                                        <td class="px-4 py-3 border w-1/6 text-center">Fruit and Vegitable</td>
                                        <td class="px-4 py-3 border w-1/6 text-center">{{ $fruit->name }}</td>
                                        <td class="px-4 py-3 border w-1/3 text-center">{{ $fruit->charactaristic }}</td>
                                     
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                @foreach ($selected_enzymes as $enzyme)
                                    <tr>
                                        <td class="px-4 py-3 border w-1/6 text-center">Enzyme</td>
                                        <td class="px-4 py-3 border w-1/6 text-center">{{ $enzyme->name }}</td>
                                        <td class="px-4 py-3 border w-1/3 text-center">{{ $enzyme->charactaristic }}</td>
                                      
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                @foreach ($selected_substrates as $substrate)
                                    <tr>
                                        <td class="px-4 py-3 border w-1/6 text-center">Substrate</td>
                                        <td class="px-4 py-3 border w-1/6 text-center">{{ $substrate->name }}</td>
                                        <td class="px-4 py-3 border w-1/3 text-center">{{ $substrate->charactaristic }}</td>
                                       
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                @foreach ($selected_gases as $gas)
                                    <tr>
                                        <td class="px-4 py-3 border w-1/6 text-center">Gas</td>
                                        <td class="px-4 py-3 border w-1/6 text-center">{{ $gas->name }}</td>
                                        <td class="px-4 py-3 border w-1/3 text-center">{{ $gas->charactaristic }}</td>
                                      
                                        
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