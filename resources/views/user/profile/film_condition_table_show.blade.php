


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Film Condition Table
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">

                            {{-- <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                            </div> --}}

                            @php
                                $number_composition = 1;
                            @endphp
                            <div class="flex justify-center mt-5">                                
                                <div class="flex justify-center flex-wrap lg:w-2/3 md:w-full"> 
                                    @foreach($compositions as $composition)
                                    <div class="w-1/3">
                                        <div class="flex justify-center mt-2 p-1 w-full bg-gray-400">
                                            <div class="text-white">
                                                Composition:{{$number_composition}}
                                            </div>
                                        </div> 
                                        <div>
                                            <div class="border-1 border-gray-300">

                                                <div class="flex-col" style="display: flex; flex-direction: column;">
                                                    
                                                    <div class="border">

                                                        @foreach($materials[$composition->id] as $material)
                                                        <p class="text-center">
                                                            {{$material->material_detail->name}} : {{($material->concentration)}}
                                                        </p>
                                                        @endforeach
                                                        
                                                        
                                                        {{-- @foreach($storing_tests[$composition->id] as $storing_test)
                                                        @if(!empty($storing_test))
                                                        <div class="bg-gray-300 w-full text-center">
                                                            <p>Friut or vegitable</p>
                                                        </div>
                                                            <p class="ml-2 text-center">Fruit or vegitable : {{$storing_test->fruit_detail->name}}</p>
                                                            @break
                                                        @endif
                                                        @endforeach --}}
                                                    
                                                    </div>
                                                </div>

                                                {{-- {{$charactaristic_testCounts[$composition->id]}} --}}
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $number_composition += 1;
                                    @endphp
                                    @endforeach
                                </div>
                            </div>
                            {{-- {{dd($one_film_condition->casting_amount)}} --}}
                            <div class = "flex justify-center flex-wrap">
                                {{-- @if(isset($film_condition->casting_amount) && $film_condition->casting_amount !== null) --}}
                             
                                {{-- @php
                                $number_composition = 1;
                                @endphp --}}
                                <div class="flex flex-row overflow-x-auto">
                                    <div class="container mx-auto mt-8 items-col">
                                        <div class="mt-4 mb-2">
                                            <h2 class="text-xl font-bold text-gray-900 text-center">Film Condition</h2>
                                        </div>
                                        <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                            <thead class="bg-gray-500 text-white">
                                                <tr>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Casting Amount</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Petri Dish Area</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Degasting Temperature</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Drying Temperature</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Drying Humidity</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Drying Time</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-700 border-b border-gray-600">
                                                <tr>
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$film_condition->casting_amount}}
                                                    </td>
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$film_condition->petri_dish_area}}
                                                    </td>
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$film_condition->degas_temperature}}
                                                    </td>
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$film_condition->drying_temperature}}
                                                    </td>
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$film_condition->drying_humidity}}
                                                    </td>
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$film_condition->drying_time}}
                                                    </td>
                                                        
                                                </tr>
                                                
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            {{-- @endif
                            @if(isset($film_condition->petri_dish_area) && $film_condition->petri_dish_area !== null)
                             
                            @php
                            $number_composition = 1;
                            @endphp
                            <div class="flex flex-row overflow-x-auto">
                                <div class="container mx-auto mt-8 items-col">
                                    <div class="mt-4 mb-2">
                                        <h2 class="text-xl font-bold text-gray-900 text-center">Petri Dish Area</h2>
                                    </div>
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                @foreach($compositions as $composition)
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                @php
                                                    $number_composition += 1;
                                                @endphp
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700 border-b border-gray-600">
                                            <tr>
                                                @foreach($compositions as $composition)
                                                    @foreach($film_conditions[$composition->id] as $film_condition)
                                                        <td class="text-center py-3 px-4 border-r border-gray-400">
                                                            {{$film_condition->petri_dish_area}}
                                                        </td>
                                                    @endforeach    
                                                @endforeach
                                            </tr>
                                            
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        @endif
                        @if(isset($film_condition->degas_temperature) && $film_condition->degas_temperature !== null)
                             
                        @php
                        $number_composition = 1;
                        @endphp
                        <div class="flex flex-row overflow-x-auto">
                            <div class="container mx-auto mt-8 items-col">
                                <div class="mt-4 mb-2">
                                    <h2 class="text-xl font-bold text-gray-900 text-center">Degasting Temperature</h2>
                                </div>
                                <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                    <thead class="bg-gray-500 text-white">
                                        <tr>
                                            @foreach($compositions as $composition)
                                            <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                            @php
                                                $number_composition += 1;
                                            @endphp
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700 border-b border-gray-600">
                                        <tr>
                                            @foreach($compositions as $composition)
                                                @foreach($film_conditions[$composition->id] as $film_condition)
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$film_condition->degas_temperature}}
                                                    </td>
                                                @endforeach    
                                            @endforeach
                                        </tr>
                                        
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    @endif
                    @if(isset($one_film_condition->drying_temperature) && $one_film_condition->drying_temperature !== null)
                             
                    @php
                    $number_composition = 1;
                    @endphp
                    <div class="flex flex-row overflow-x-auto">
                        <div class="container mx-auto mt-8 items-col">
                            <div class="mt-4 mb-2">
                                <h2 class="text-xl font-bold text-gray-900 text-center">Drying Temperature</h2>
                            </div>
                            <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                <thead class="bg-gray-500 text-white">
                                    <tr>
                                        @foreach($compositions as $composition)
                                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 border-b border-gray-600">
                                    <tr>
                                        @foreach($compositions as $composition)
                                            @foreach($film_conditions[$composition->id] as $film_condition)
                                                <td class="text-center py-3 px-4 border-r border-gray-400">
                                                    {{$film_condition->drying_temperature}}
                                                </td>
                                            @endforeach    
                                        @endforeach
                                    </tr>
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                @endif

                @if(isset($one_film_condition->drying_humidity) && $one_film_condition->drying_humidity !== null)
                             
                @php
                $number_composition = 1;
                @endphp
                <div class="flex flex-row overflow-x-auto">
                    <div class="container mx-auto mt-8 items-col">
                        <div class="mt-4 mb-2">
                            <h2 class="text-xl font-bold text-gray-900 text-center">Drying Humidity</h2>
                        </div>
                        <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-500 text-white">
                                <tr>
                                    @foreach($compositions as $composition)
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                    @php
                                        $number_composition += 1;
                                    @endphp
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 border-b border-gray-600">
                                <tr>
                                    @foreach($compositions as $composition)
                                        @foreach($film_conditions[$composition->id] as $film_condition)
                                            <td class="text-center py-3 px-4 border-r border-gray-400">
                                                {{$film_condition->drying_humidity}}
                                            </td>
                                        @endforeach    
                                    @endforeach
                                </tr>
                                
                            </tbody>

                        </table>
                    </div>
                </div>
            @endif
            @if(isset($one_film_condition->drying_time) && $one_film_condition->drying_time !== null)
                             
            @php
            $number_composition = 1;
            @endphp
            <div class="flex flex-row overflow-x-auto">
                <div class="container mx-auto mt-8 items-col">
                    <div class="mt-4 mb-2">
                        <h2 class="text-xl font-bold text-gray-900 text-center">Drying Time</h2>
                    </div>
                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-500 text-white">
                            <tr>
                                @foreach($compositions as $composition)
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                @php
                                    $number_composition += 1;
                                @endphp
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 border-b border-gray-600">
                            <tr>
                                @foreach($compositions as $composition)
                                    @foreach($film_conditions[$composition->id] as $film_condition)
                                        <td class="text-center py-3 px-4 border-r border-gray-400">
                                            {{$film_condition->drying_time}}
                                        </td>
                                    @endforeach    
                                @endforeach
                            </tr>
                            
                        </tbody>

                    </table>
                </div>
            </div>
        @endif --}}

                                                       

                           


                        </div>

                            
                            <div class="p-2 w-full flex justify-around mt-4">
                              <button onclick="location.href='{{ route('user.experiment_register', ['experiment_id'=>$experiment->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded my-2">Back</button>
                            </div>
                        </div>
                           
                    </section>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    








                            