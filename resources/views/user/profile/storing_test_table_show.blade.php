


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Storing Test Table
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
                           
                            <div class = "flex justify-center flex-wrap">
                            @if(isset($one_storing_test->mass_loss_rate) && $one_storing_test->mass_loss_rate !== null)
                                @php
                                $number_composition = 1;
                                @endphp
                                <div class="flex flex-row overflow-x-auto">
                                    <div class="container mx-auto mt-8 items-col">
                                        <div class="mt-4 mb-2">
                                            <h2 class="text-xl font-bold text-gray-900 text-center">Mass Loss Rate</h1>
                                        </div>
                                        <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                            <thead class="bg-gray-500 text-white">
                                                <tr>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-l border-r">Day</th>
                                                    @foreach($compositions as $composition)
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                    @php
                                                        $number_composition += 1;
                                                    @endphp
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-700 border-b border-gray-600">
                                                @foreach($compositions as $composition)
                                                @foreach($storing_tests[$composition->id] as $storing_test)
                                                <tr>
                                                    <td class="text-center py-3 px-4 border-r border-l border-gray-400">{{$storing_test->storing_day}}</td>
                                                    @foreach($compositions as $composition)
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">
                                                        {{$storing_test->mass_loss_rate}}
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                                @break
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                {{-- </div> --}}
                            @endif
                                                           

                            @if(isset($one_storing_test->tss) && $one_storing_test->tss !== null)
                                @php
                                $number_composition = 1;
                                @endphp
                                <div class="flex justify-center">
                                    <div class="container mx-auto mt-8 itmes-col">
                                        <div class="mt-4 mb-2">
                                        <h1 class="text-xl font-bold text-gray-900 text-center">TSS</h1>
                                    </div>
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">Day</th>
                                                @foreach($compositions as $composition)
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                @php
                                                    $number_composition += 1;
                                                @endphp
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700 border-b border-gray-400">
                                            @foreach($compositions as $composition)
                                            @foreach($storing_tests[$composition->id] as $storing_test)
                                            <tr>
                                                <td class="text-center py-3 px-4 border-r border-l border-gray-400">{{$storing_test->storing_day}}</td>
                                                @foreach($compositions as $composition)
                                                <td class="text-center py-3 px-4 border-r border-gray-400">
                                                    {{$storing_test->tss}}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @break
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                    
                                </div>
                            @endif
                            
                            @if(isset($one_storing_test->hardness) && $one_storing_test->hardness !== null)
                                @php
                                $number_composition = 1;
                                @endphp
                                <div class="flex justify-center">
                                    <div class="container mx-auto mt-8 itmes-col">
                                    <div class="mt-4 mb-2">
                                        <h1 class="text-xl font-bold text-gray-900 text-center">Hardness</h1>
                                    </div>
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">Day</th>
                                                @foreach($compositions as $composition)
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                @php
                                                    $number_composition += 1;
                                                @endphp
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700 border-b border-gray-400">
                                            @foreach($compositions as $composition)
                                            @foreach($storing_tests[$composition->id] as $storing_test)
                                            <tr>
                                                <td class="text-center py-3 px-4 border-r border-l border-gray-400">{{$storing_test->storing_day}}</td>
                                                @foreach($compositions as $composition)
                                                <td class="text-center py-3 px-4 border-r border-gray-40">
                                                    {{$storing_test->hardness}}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @break
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>    
                                </div>
                            @endif
                            
                            @if(isset($one_storing_test->moisture_content) && $one_storing_test->moisture_content !== null)
                                @php
                                $number_composition = 1;
                                @endphp
                                <div class="flex justify-center">
                                    <div class="container mx-auto mt-8 itmes-col">
                                    <div class="mt-4 mb-2">
                                        <h1 class="text-xl font-bold text-gray-900 text-center">Moisture Content</h1>
                                    </div>
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">Day</th>
                                                @foreach($compositions as $composition)
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                @php
                                                    $number_composition += 1;
                                                @endphp
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700 border-b border-gray-400">
                                            @foreach($compositions as $composition)
                                            @foreach($storing_tests[$composition->id] as $storing_test)
                                            <tr>
                                                <td class="text-center py-3 px-4 border-r border-gray-400">{{$storing_test->storing_day}}</td>
                                                @foreach($compositions as $composition)
                                                <td class="text-center py-3 px-4 border-r border-gray-400">
                                                    {{$storing_test->moisture_content}}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @break
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            @endif
                            

                            @if(isset($one_storing_test->ta) && $one_storing_test->ta !== null)
                                @php
                                $number_composition = 1;
                                @endphp
                                <div class="flex justify-center">
                                    <div class="container mx-auto mt-8 itmes-col">
                                    <div class="mt-4 mb-2">
                                        <h1 class="text-xl font-bold text-gray-900 text-center">TA</h1>
                                    </div>
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">Day</th>
                                                @foreach($compositions as $composition)
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                @php
                                                    $number_composition += 1;
                                                @endphp
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700 border-b border-gray-400">
                                            @foreach($compositions as $composition)
                                            @foreach($storing_tests[$composition->id] as $storing_test)
                                            <tr>
                                                <td class="text-center py-3 px-4  border-r border-gray-400">{{$storing_test->storing_day}}</td>
                                                @foreach($compositions as $composition)
                                                <td class="text-center py-3 px-4  border-r border-gray-400">
                                                    {{$storing_test->ta}}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @break
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            @endif
                            
                           
                            @if(isset($one_storing_test->vitamin_c) && $one_storing_test->vitamin_c !== null)
                                @php
                                $number_composition = 1;
                                @endphp
                                <div class="flex justify-center">
                                    <div class="container mx-auto mt-8 itmes-col">
                                    <div class="mt-4 mb-2">
                                        <h1 class="text-xl font-bold text-gray-900 text-center">Vitamin C</h1>
                                    </div>
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">Day</th>
                                                @foreach($compositions as $composition)
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                @php
                                                    $number_composition += 1;
                                                @endphp
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700  border-b border-gray-400">
                                            @foreach($compositions as $composition)
                                            @foreach($storing_tests[$composition->id] as $storing_test)
                                            <tr>
                                                <td class="text-center py-3 px-4  border-r border-gray-400">{{$storing_test->storing_day}}</td>
                                                @foreach($compositions as $composition)
                                                <td class="text-center py-3 px-4  border-r border-gray-400">
                                                    {{$storing_test->vitamin_c}}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @break
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            @endif

                            @if(isset($one_storing_test->rr) && $one_storing_test->rr !== null)
                                @php
                                $number_composition = 1;
                                @endphp
                                <div class="flex justify-center">
                                    <div class="container mx-auto mt-8 itmes-col">
                                    <div class="mt-4 mb-2">
                                        <h1 class="text-xl font-bold text-gray-900 text-center">Respirtry Rate</h1>
                                    </div>
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">Day</th>
                                                @foreach($compositions as $composition)
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">Composition:{{$number_composition}}</th>
                                                @php
                                                    $number_composition += 1;
                                                @endphp
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700  border-b border-gray-400">
                                            @foreach($compositions as $composition)
                                            @foreach($storing_tests[$composition->id] as $storing_test)
                                            <tr>
                                                <td class="text-center py-3 px-4  border-r border-gray-400">{{$storing_test->storing_day}}</td>
                                                @foreach($compositions as $composition)
                                                <td class="text-center py-3 px-4  border-r border-gray-400">
                                                    {{$storing_test->rr}}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @break
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                </div>
                            @endif
                            
                            @if(isset($one_storing_test->l) && $one_storing_test->l !== null)
                            @php
                            $number_composition = 1;
                            @endphp
                                <div class="container mx-auto mt-8 itmes-col">
                                    <div class="mt-4 mb-2">
                                        <h1 class="text-xl font-bold text-gray-900 text-center">Color Test</h1>
                                    </div>
                                
                                    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                                        <thead class="bg-gray-500 text-white">
                                            <tr>
                                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">Day</th>
                                                @foreach($compositions as $composition)
                                                    <th colspan="4" class="text-center py-3 px-4 uppercase font-semibold text-sm border-r border-b">
                                                        Composition: {{$number_composition}}
                                                    </th>
                                                    @php $number_composition += 1; @endphp
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th class = "border-r"></th>
                                                @foreach($compositions as $composition)
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">L*</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">a*</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">b*</th>
                                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm border-r">ΔE</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        
                                        <tbody class="text-gray-700 border-b border-gray-400">
                                            @foreach($compositions as $composition)
                                            @foreach($storing_tests[$composition->id] as $storing_test)
                                            <tr>
                                                <td class="text-center py-3 px-4 border-r border-l border-gray-400">{{$storing_test->storing_day}}</td>
                                                @foreach($compositions as $composition)
                                                    <td class="text-center py-3 px-4">{{$storing_test->l}}</td>
                                                    <td class="text-center py-3 px-4">{{$storing_test->a}}</td>
                                                    <td class="text-center py-3 px-4">{{$storing_test->b}}</td>
                                                    <td class="text-center py-3 px-4 border-r border-gray-400">{{$storing_test->e}}</td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @break
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            @endif


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
    








                            