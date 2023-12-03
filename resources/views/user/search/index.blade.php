<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Search
        </h2>
    </x-slot>
    
    {{-- <div class="lg:w-1/4 md:w-1/2 w-full px-4 mx-auto mt-6"> --}}
        <div class="lg:w-1/2 w-full px-4 mx-auto mt-6">
            <div class="flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center items-end md:justify-start">
            <form action="{{ route('user.search.index') }}" method="GET">
                <div class = "flex items-end w-[900px] ">
                    <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
                        <label for="footer-field" class="leading-7 text-sm text-gray-600">Key words</label>
                        <input type="text" name="keyword" value="{{ $keyword }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>

                    <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2 ">
                        <label for="footer-field" class="leading-7 text-sm text-gray-600">Materials</label>
                        <select name="material" data-toggle="select">
                            <option value="">All</option>
                            @foreach ($materials_list as $selected_material)
                            <option value="{{ $selected_material->name }}"> {{ $selected_material->name }}</option>
                            @endforeach
                        </select>                    
                    </div>
                    <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
                        <label for="footer-field" class="leading-7 text-sm text-gray-600">Additives</label>
                        <select name="additive" data-toggle="select">
                            <option value="">All</option>
                            @foreach ($additives_list as $selected_additive)
                            <option value="{{ $selected_additive->name }}"> {{ $selected_additive->name }}</option>
                            @endforeach
                        </select>                    
                    </div>
                    <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
                        <label for="footer-field" class="leading-7 text-sm text-gray-600">Bacteria</label>
                        <select name="bacterium" data-toggle="select">
                            <option value="">All</option>
                            @foreach ($bacteria_list as $selected_bacterium)
                            <option value="{{ $selected_bacterium->name }}"> {{ $selected_bacterium->name }}</option>
                            @endforeach
                        </select>                    
                    </div>
                    <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
                        <label for="footer-field" class="leading-7 text-sm text-gray-600">Fruits</label>
                        <select name="fruit" data-toggle="select">
                            <option value="">All</option>
                            @foreach ($fruits_list as $selected_fruit)
                            <option value="{{ $selected_fruit->name }}"> {{ $selected_fruit->name }}</option>
                            @endforeach
                        </select>                    
                    </div>
                    

                    <div>
                        <input type="submit" value="Search" class="lg:mt-2 xl:mt-4 flex-shrink-0 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                    
                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                            
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Title</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Date</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Paper</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selected_experiments as $experiment)
                                    <tr>
                                        <td class="px-4 py-3">{{ $experiment->title }}</td>
                                        <td class="px-4 py-3">{{ $experiment->name }}</td>
                                        <td class="px-4 py-3">{{ $experiment->date }}</td>
                                        <td class="px-4 py-3">{{ $experiment->paper }}</td>
                                        <td class="px-4 py-3">
                                            <button onclick="location.href='{{ route('user.search.show', ['search' => $experiment->id])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Detail</button>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                {{ $selected_experiments->links()}}
                            </tbody>
                            </table>
                            
                    </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
