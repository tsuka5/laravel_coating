<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            
        </h2>
    </x-slot>
    <div class="mb-2 py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="justify-center p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        @if (session('error_message'))
                            <div class="error-message">
                                {{ session('error_message') }}
                            </div>
                        @endif

                        <div class="container mx-auto">
                            <x-flash-message status="session('status')" />
                        
                            <div class="lg:w-2/3 mx-auto">

                                <div class="flex justify-center mt-2 p-1 w-full bg-gray-400">
                                    <div class="text-white mt-1 mr-4">
                                        Experiment Information
                                    </div>
                                    <form  class="mt-1.5" id="delete_experiment_{{ $experiment->id }}" method="post" action="{{ route('user.destroy.data', ['experiment_id' => $experiment->id, 'type' =>'experiment', 'id' => $experiment->id ])}}">
                                        @csrf
                                        @method('delete')   
                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this, 'experiment')" class="h-9 text-white bg-red-400 border-0 px-4 focus:outline-none
                                            hover:bg-red-500 rounded">Delete_Experiment</a>
                                    </form> 
                                    
                                </div>
                            
                            
                                @if ($experiment->paper_url === null)
                                <div class="flex flex-wrap">
                                    <div class="w-1/2 border-2">
                                        <p class="text-left">Name : {{$experiment->name}}</p>
                                    </div>
                                    <div class="w-1/2 border-2">
                                        <p class="text-left">Date : {{$experiment->day}}</p>
                                    </div>
                                    <div class="w-full border-2">
                                        <p class="text-left">Title : {{$experiment->title}}</p>
                                    </div>
                                    
                                </div>
                                @else
                                <div class="flex flex-wrap border-2 border-gray-400">
                                    <div class="w-1/2 border-b border-r-2 border-gray-400 pt-3 pl-2">
                                        <p class="text-left">Name : {{$experiment->name}}</p>
                                    </div>
                                    <div class="w-1/2 border-b border-l-2 border-gray-400 pt-3 pl-2">
                                        <p class="text-left">Date : {{$experiment->day}}</p>
                                    </div>
                                    <div class="w-full border-b border-t-2 border-gray-400 pt-3 pl-2">
                                        <p class="text-left">Title : {{$experiment->title}}</p>
                                    </div>
                                    <div class="w-full border-b border-t-2 border-gray-400 pt-3 pl-2">
                                        <p class="text-left">URL : {{$experiment->paper_url}}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                                
    
                                @php
                                    $number_composition = 1;
                                @endphp
                                <div class="flex justify-center mt-5">                                
                                    <div class="flex justify-center flex-wrap lg:w-2/3 md:w-full mx-auto"> 
                                        {{-- @if($compositions->isNotEmpty())
                                        @foreach($compositions as $composition)
                                        <div class="w-1/3">
                                            <div class="flex justify-center mt-2 p-1 w-full bg-gray-400">
                                                <div class="text-white">
                                                    Composition:{{$number_composition}}
                                                </div>
                                                
                                                <form  id="delete_composition_{{ $composition->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' => $experiment->id, 'type' => 'composition', 'id' => $composition->id ])}}">
                                                    @csrf
                                                    @method('delete')  
                                                    <a href="#" data-id="{{ $composition->id }}" onclick="deletePost(this, 'composition')" class="mb-2 ml-3 text-white bg-red-400 border-0 py-1 px-1 focus:outline-none text-xs
                                                        hover:bg-red-500 rounded">Delete</a>
                                                </form>
                                             

                                                
                                            </div> 
                                            <div>
                                                <div class="border-2 border-gray-300">

                                                    <div class="flex-col" style="display: flex; flex-direction: column;">
                                                        
                                                        <div>
                    
                                                            @foreach($materials[$composition->id] as $material)
                                                            <p class="text-center">
                                                                {{$material->material_detail->name}} : {{($material->concentration)}}
                                                            </p>
                                                            @endforeach
                                                                                                                  
                                                            
                                                        </div>
                                                    </div>
                                  
                                                    <div class='flex-col'>
                                                        @php
                                                        $number_material=1;
                                                        @endphp
                                                        <button class="toggle-button p-1 underline w-full bg-gray-200 hover:text-indigo-400" data-target="material_button_{{$number_composition}}" >
                                                           Add Material
                                                        </button>
                                                        
                                                        <div id="material_button_{{$number_composition}}" style="display: none;">

                                                            @foreach($materials[$composition->id] as $material)
                                                            <table class="border w-full">
                                                                <thead>
                                                                    <tr>
                                                                        <p class="px-2 text-center mt-3"  style="word-wrap: break-word; max-width: 100%;">
                                                                                {{$material->material_detail->name}}
                                                                        </p>
                                                                    </tr>
                                                                </thead>
                                                        
                                                                <tbody>
                                                                    <tr>
                                                                    
                                                                        <td class="mr-1 py-2 text-right w-1/5">
                                                                            <div class="mr-2">
                                                                                <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'material', 'id' => $material->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                                                    hover:bg-indigo-500 rounded w-20">Edit</button>
                                                                            </div> 
                                                                        </td>
                                                                        <td class="px-2 py-2 text-right w-1/5">
                                                                            <div>
                                                                                
                                                                                <form  id="delete_material_{{ $material->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' =>$experiment->id, 'type' => 'material', 'id' => $material->id ])}}">
                                                                                    @csrf
                                                                                    @method('delete')  
                                                                                    <a href="#" data-id="{{ $material->id }}" onclick="deletePost(this, 'material')" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                                                        hover:bg-red-500 rounded">Delete</a>
                                                                                </form> 
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                
                                                                </tbody>
                                                            </table>
                                                            @php
                                                                $number_material += 1;
                                                            @endphp
                                                            @endforeach
                                                        
                                                            <div class="p-1 flex justify-center">
                                                                <button type="button" data-toggle="modal" data-target="#material_{{$composition->id}}" class="text-black px-4 py-2 border-2 border-gray-400 hover:bg-gray-300 rounded">Add_Mateial</button> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="p-1 flex justify-end">
                                                    <form method="post" action="{{ route('user.profile.create.copy_composition', ['experiment_id'=> $experiment->id, 'composition_id'=>$composition->id]) }}">
                                                    @csrf
                                                        <button type="submit" class="ml-2 text-white bg-indigo-400 border-0 py-1 px-1 focus:outline-none text-xs
                                                        hover:bg-red-500 rounded">copy</button> 
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                        @endforeach
                                        @endif --}}
                                        @if($compositions->isNotEmpty())
                                        @foreach($compositions as $composition)
                                        <div class="w-1/3">
                                            <div class="flex justify-center mt-2 p-1 w-full bg-gray-400">
                                                <div class="text-white">
                                                    Composition: {{$number_composition}}
                                                </div>
                                                
                                                <form id="delete_composition_{{ $composition->id }}" method="post" action="{{ route('user.destroy.data', ['experiment_id' => $experiment->id, 'type' => 'composition', 'id' => $composition->id]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="#" data-id="{{ $composition->id }}" onclick="deletePost(this, 'composition')" class="mb-2 ml-3 text-white bg-red-400 border-0 py-1 px-1 focus:outline-none text-xs hover:bg-red-500 rounded">Delete</a>
                                                </form>
                                            </div>
                                            
                                            <div>
                                                <div class="border-2 border-gray-300">
                                                    <div class="flex-col" style="display: flex; flex-direction: column;">
                                                        <div>
                                                            @if(isset($materials[$composition->id]) && $materials[$composition->id]->isNotEmpty())
                                                                @foreach($materials[$composition->id] as $material)
                                                                <p class="text-center">
                                                                    {{$material->material_detail->name}} : {{ $material->concentration }}
                                                                </p>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class='flex-col'>
                                                        @php
                                                            $number_material = 1;
                                                        @endphp
                                                        <button class="toggle-button p-1 underline w-full bg-gray-200 hover:text-indigo-400" data-target="material_button_{{$number_composition}}">
                                                            Add Material
                                                        </button>
                                                        
                                                        <div id="material_button_{{$number_composition}}" style="display: none;">
                                                            @if(isset($materials[$composition->id]) && $materials[$composition->id]->isNotEmpty())
                                                            @foreach($materials[$composition->id] as $material)
                                                            <table class="border w-full">
                                                                <thead>
                                                                    <tr>
                                                                        <p class="px-2 text-center mt-3" style="word-wrap: break-word; max-width: 100%;">
                                                                            {{$material->material_detail->name}}
                                                                        </p>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="mr-1 py-2 text-right w-1/5">
                                                                            <div class="mr-2">
                                                                                <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'material', 'id' => $material->id]) }}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded w-20">Edit</button>
                                                                            </div>
                                                                        </td>
                                                                        <td class="px-2 py-2 text-right w-1/5">
                                                                            <div>
                                                                                <form id="delete_material_{{ $material->id }}" method="post" action="{{ route('user.destroy.data', ['experiment_id' => $experiment->id, 'type' => 'material', 'id' => $material->id]) }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <a href="#" data-id="{{ $material->id }}" onclick="deletePost(this, 'material')" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            @php
                                                                $number_material += 1;
                                                            @endphp
                                                            @endforeach
                                                            @endif
                                                            
                                                            <div class="p-1 flex justify-center">
                                                                <button type="button" data-toggle="modal" data-target="#material_{{$composition->id}}" class="text-black px-4 py-2 border-2 border-gray-400 hover:bg-gray-300 rounded">Add Material</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="p-1 flex justify-end">
                                                    <form method="post" action="{{ route('user.profile.create.copy_composition', ['experiment_id' => $experiment->id, 'composition_id' => $composition->id]) }}">
                                                        @csrf
                                                        <button type="submit" class="ml-2 text-white bg-indigo-400 border-0 py-1 px-1 focus:outline-none text-xs hover:bg-red-500 rounded">copy</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                        @endforeach
                                    @endif
                                    </div>
                                </div>
                                                {{-- <div class="mt-2">
                                                    <div>
                                                        <button class="toggle-button p-1 underline w-full bg-gray-200 hover:text-indigo-400" data-target="characteristic_button{{$number_composition}}" >
                                                            characteristic Test
                                                        </button>
                                                        <div id="characteristic_button{{$number_composition}}" style="display: none;">
                                                            @if($charactaristic_testCounts[$composition->id] !== 0)
                                                                <table class="border flex justify-center">
                                                                    <tbody class="divide-y divide-gray-400">
                                                                        @foreach($characteristic_tests[$composition->id] as $characteristic_test)
                                                                            <tr>
                                                                                <td class="px-2 py-2 text-center">
                                                                                    <div class="flex justify-center my-2">
                                                                                        <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'charactaristic_test', 'id' => $characteristic_test->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded w-20">Edit</button>
                                                                                    </div> 
                                                                                </td>
                                                                                <td class="py-2 px-2 text-center">
                                                                                    <div class="flex justify-center my-2">
                                                                                        <form  id="delete_characteristic_test_{{ $characteristic_test->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' => $experiment->id, 'type' => 'characteristic_test', 'id' => $characteristic_test->id ])}}">
                                                                                            @csrf
                                                                                            @method('delete')  
                                                                                            <a href="#" data-id="{{ $characteristic_test->id }}" onclick="deletePost(this, 'characteristic_test')" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                                                                hover:bg-red-500 rounded">Delete</a>
                                                                                        </form> 
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div class="p-1 flex justify-center">
                                                                    <button type="button" data-toggle="modal" data-target="#characteristic_test_{{$composition->id}}" class="text-black py-2 border-2 border-gray-400 hover:bg-gray-300 rounded px-4 p-1">Add_characteristic_test</button>                                            
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div> 
    
                                                  
                                                </div> --}}


                                            
                                                
                                                    
                                            


                                                {{-- <div class="mt-2">
                                                    <button class="toggle-button p-1 underline w-full bg-gray-200 hover:text-indigo-400" data-target="antibacteria_test_button_{{$number_composition}}" >
                                                        Antibacteria Test
                                                    </button>
                                                    <div id="antibacteria_test_button_{{$number_composition}}" style="display: none;">

                                                        @if($bacteria_test)

                                                        <table class="border w-full">
                                                            <tbody>
                                                                
                                                                <tr>
                                                                    <td class="px-2 py-2 text-center w-3/5">
                                                                        <p  style="word-wrap: break-word; max-width: 100%;">
                                                                        {{$bacteria_test->bacteria_detail->name}}
                                                                        </p>
                                                                    
                                                                    </td>
                                                                    <td class="px-2 py-2 text-center">
                                                                        <div class="my-2 w-1/5">
                                                                            <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'antibacteria_test', 'id' => $bacteria_test->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                                                hover:bg-indigo-500 rounded w-20">Edit</button>
                                                                        </div> 
                                                                    </td>
                                                                    <td class="px-2 py-2 text-center">
                                                                        <div class="my-2 w-1/5">
                                                                            <form id="delete_bacteria_test_{{ $bacteria_test->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' =>$experiment->id, 'type' => 'bacteria_test', 'id' => $bacteria_test->id ])}}">
                                                                                @csrf
                                                                                @method('delete')  
                                                                                <a href="#" data-id="{{ $bacteria_test->id }}" onclick="deletePost(this, 'bacteria_test')" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                                                    hover:bg-red-500 rounded">Delete</a>
                                                                            </form> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            
                                                            </tbody>
                                                        </table>
                                                        <div class="p-1 text-center">
                                                        @endif
                                                            <button type="button" data-toggle="modal" data-target="#antibacteria_test_{{$composition->id}}" class="text-black py-2 px-4 border-2 border-gray-400 hover:bg-gray-300 rounded">Add_Antibacteria_Test</button>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                

                                                {{-- <div class="modal fade" id="characteristic_test_{{$composition->id}}" tabindex="-1" aria-labelledby="characteristicTestLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="characteristicTestLabel">Add Characteristic Test</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('layouts.create_form', ['formType' => 'charactaristic_test', 'id' => $composition->id])
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="film_condition" tabindex="-1" aria-labelledby="filmConditionLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="filmConditionLabel">Add Film Condition</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('layouts.create_form', ['formType' => 'film_condition', 'id' => $experiment->id])
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div> --}}



                                                @if($compositions->isNotEmpty())
                                                <div class="modal fade" id="storing_test_{{$composition->id}}" tabindex="-1" aria-labelledby="storingTestLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="storingTestLabel">Add Storing Test</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('layouts.create_form', ['formType' => 'storing_test', 'id' => $experiment->id])
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                @endif

                                                @if($compositions->isNotEmpty())
                                                <div class="modal fade" id="antibacteria_test_{{$composition->id}}" tabindex="-1" aria-labelledby="antibacteriaTestLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="antibacteriaTestLabel">Antibacteria Test</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('layouts.create_form', ['formType' => 'antibacteria_test', 'id' => $composition->id])
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                @endif
                                                

                                                @foreach($compositions as $composition)
                                                <div class="modal fade" id="material_{{$composition->id}}" tabindex="-1" aria-labelledby="materialLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="materialLabel">Add Material {{$composition->id}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('layouts.create_form', ['formType' => 'material', 'id' => $composition->id])
                                                        </div>
                                                    </div>
                                                    </div>
                                                {{-- </div> --}}


                                        {{-- </div> --}}
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                
                            </div>
                            
                                @endforeach
                                <div class="flex justify-center">
                                    <form method="post" action="{{ route('user.profile.create.composition', ['experiment_id'=> $experiment->id]) }}">
                                    @csrf
                                        <button otype="submit" class="my-6 h-9 text-white bg-green-400 border-0 py-2 px-4 focus:outline-none
                                            hover:bg-green-500 rounded">+Add Composition</button>
                                    </form>
                                </div>

                                {{-- 試験結果 --}}
                                <div class="flex justify-center">
                                    <div class="lg:w-2/3 md:w-full mx-auto flex flex-wrap">
                                        <div class="flex justify-center p-1 w-full bg-gray-400">
                                            <div class="text-white">
                                                Result 
                                            </div>
                                        </div>
                                        <div class="w-1/2 border-2 border-gray-300">
                                            <div class="flex justify-center bg-gray-200">
                                                <div class="p-1 w-full text-center ml-5">
                                                    Film Condition
                                                </div>
                                                
                                                <div class="my-1 mr-2">
                                                    <form  id="delete_film_condition_{{ $experiment->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' => $experiment->id, 'type' => 'film_condition', 'id' => $experiment->id ])}}">
                                                        @csrf
                                                        @method('delete')  
                                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this, 'film_condition')" class="p-1 text-white bg-red-400 border-0 focus:outline-none text-xs text-center
                                                            hover:bg-red-500 rounded">Delete</a>
                                                    </form> 
                                                </div>
                                            </div>

                                            @if(!$film_condition)
                                            <div class="text-center">
                                                <a href="{{ route('user.export.excel', ['experiment_id' => $experiment->id, 'type' => 'film_condition']) }}" class="btn btn-primary m-2">Download Format Excel File</a>                                          
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ route('user.import.excel', ['type' => 'film_condition']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" id="film_condition_file" required onchange="handleFileSelect(event)">
                                                    <div class="flex justify-center">
                                                        <button type="submit" id="film_condition_upload_button" style="display: none;" class="p-2 m-2 text-white bg-red-500 border-0 focus:outline-none
                                                        hover:bg-red-600 rounded">Upload Excel File</button>
                                                    </div>
                                                </form>
                                            </div> 
                                            @else
                                            <div class="flex justify-center">
                                                <button onclick="location.href='{{ route('user.show.table', ['id' => $experiment->id, 'type' => 'film_condition']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Table</button>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('user.edit_export.excel', ['experiment_id' => $experiment->id, 'type' => 'film_condition']) }}" class="btn btn-primary m-2">Download Now Data</a>                                          
                                            </div>
                                            @endif
                                        </div>

                                        <div class="w-1/2 border-2 border-gray-300">
                                            <div class="flex justify-center bg-gray-200">
                                                <div class="p-1 w-full text-center ml-5">
                                                    Characteristic Test
                                                </div>
                                                <div class="my-1 mr-2">
                                                    <form  id="delete_characteristic_test_{{ $experiment->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' => $experiment->id, 'type' => 'characteristic_test', 'id' => $experiment->id ])}}">
                                                        @csrf
                                                        @method('delete')  
                                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this, 'characteristic_test')" class="p-1 text-white bg-red-400 border-0 focus:outline-none text-xs text-center
                                                            hover:bg-red-500 rounded">Delete</a>
                                                    </form> 
                                                </div>
                                            </div>

                                            @if($characteristic_test->isEmpty())
                                            <div class="text-center">
                                                <a href="{{ route('user.export.excel', ['experiment_id' => $experiment->id, 'type' => 'characteristic_test']) }}" class="btn btn-primary m-2">Download Format Excel File</a>                                          
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ route('user.import.excel', ['type' => 'characteristic_test']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" id="characteristic_test_file" required onchange="handleFileSelect(event)">
                                                    <div class="flex justify-center">
                                                        <button type="submit" id="characteristic_test_upload_button" style="display: none;" class="p-2 m-2 text-white bg-red-500 border-0 focus:outline-none
                                                        hover:bg-red-600 rounded">Upload Excel File</button>
                                                    </div>
                                                </form>
                                            </div> 
                                            @else
                                            <div class="flex justify-center">
                                                {{-- <button onclick="location.href='{{ route('user.show.table', ['id' => $experiment->id, 'type' => 'characteristic_test']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Table</button> --}}
                                                <button onclick="location.href='{{ route('user.show.chart', ['id' => $experiment->id, 'type' => 'characteristic_test']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Chart</button>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('user.edit_export.excel', ['experiment_id' => $experiment->id, 'type' => 'characteristic_test']) }}" class="btn btn-primary m-2">Download Now Data</a>                                          
                                            </div>
                                            @endif
                                        </div>

                                        <div class="mt-2 w-1/2 border-2 border-gray-300">
                            
                                            <div class="flex justify-center bg-gray-200">
                                                <div class="p-1 w-full text-center ml-5">
                                                    Storing Test
                                                </div>
                                                <div class="my-1 mr-2">
                                                    <form  id="delete_multiple_test_{{ $experiment->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' => $experiment->id, 'type' => 'multiple_test', 'id' => $experiment->id ])}}">
                                                        @csrf
                                                        @method('delete')  
                                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this, 'multiple_test')" class="p-1 text-white bg-red-400 border-0 focus:outline-none text-xs text-center
                                                            hover:bg-red-500 rounded">Delete</a>
                                                    </form> 
                                                </div>
                                            </div>
                                    
                                            <div class="mt-2">
                                            @if(!$storing_test)
                                             
                                                <div class="p-1 text-center">
                                                    <button type="button" data-toggle="modal" data-target="#storing_test_{{$composition->id}}" class="toggle-button p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none hover:bg-gray-600 rounded">Basic Information</button>
                                                </div>

                                                {{-- <div class="text-center">
                                                    <a href="{{ route('user.export.excel', ['experiment_id' => $experiment->id, 'type' => 'storing_test']) }}" class="btn btn-primary m-2">Download Format Excel File</a>                                          
                                                </div>
                                                <div class="p-2">
                                                    <form action="{{ route('user.import.excel', ['type' => 'storing_test']) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="file" id="storing_test_file" required onchange="handleFileSelect(event)">
                                                        <div class="flex justify-center">
                                                            <button type="submit" id="storing_upload_button" style="display: none;" class="p-2 m-2 text-white bg-red-500 border-0 focus:outline-none
                                                            hover:bg-red-600 rounded">Upload Excel File</button>
                                                        </div>
                                                    </form>
                                                </div>  --}}
    
                                            @else
                                                <div class="flex justify-center">
                                                    <button class="toggle-button p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none hover:bg-gray-600 rounded" data-target="storing_test_button_{{$number_composition}}" >
                                                    Basic Information
                                                    </button>
                                                </div>
                                                
                                                <div id="storing_test_button_{{$number_composition}}" style="display: none;">
                                                    {{-- <div class="p-1 text-center">
                                                        <button type="button" data-toggle="modal" data-target="#storing_test_{{$composition->id}}" class="toggle-button p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none hover:bg-gray-600 rounded">Basic Information</button>
                                                    </div> --}}
                                                    
                                                    <table class="border w-full">
                                                        <tbody>
                                                            <tr class="flex justify-center">
                                                                <td class="mt-3 text-center w-2/5">
                                                                    <p  style="word-wrap: break-word; max-width: 100%;">
                                                                    {{$storing_test->fruit_detail->name}}
                                                                    </p>
                                                                
                                                                </td>

                                                                <td class="px-2 text-center">
                                                                    <div class="w-1/5 my-2">
                                                                        <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'storing_test', 'id' => $storing_test->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                                            hover:bg-indigo-500 rounded w-20">Edit</button>
                                                                    </div> 
                                                                </td>
                                                                <td class="px-2 text-center">
                                                                    <div class="w-1/5 my-3">
                                                                        <form id="delete_storing_test_{{ $storing_test->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' =>$experiment->id, 'type' => 'storing_test', 'id' => $storing_test->id ])}}">
                                                                            @csrf
                                                                            @method('delete')  
                                                                            <a href="#" data-id="{{ $storing_test->id }}" onclick="deletePost(this, 'storing_test')" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                                                hover:bg-red-500 rounded">Delete</a>
                                                                        </form> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div> 
                                            
                                          
                                            {{-- <div class="text-center">
                                                <a href="{{ route('user.export.excel', ['experiment_id' => $experiment->id, 'type' => 'storing_test']) }}" class="btn btn-primary m-2">Download Format Excel File</a>                                          
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ route('user.import.excel', ['type' => 'storing_test']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" id="storing_test_file" required onchange="handleFileSelect(event)">
                                                    <div class="flex justify-center">
                                                        <button type="submit" id="storing_upload_button" style="display: none;" class="p-2 m-2 text-white bg-red-500 border-0 focus:outline-none
                                                        hover:bg-red-600 rounded">Upload Excel File</button>
                                                    </div>
                                                </form>
                                            </div>  --}}
                                            {{-- {{dd($multiple_test)}} --}}
                                            @if(empty($multiple_test))
                                    
                                            <div class="text-center">
                                                <a href="{{ route('user.export.excel', ['experiment_id' => $experiment->id, 'type' => 'storing_test']) }}" class="btn btn-primary m-2">Download Format Excel File</a>                                          
                                            </div>
                                            
                                            <div class="p-2">
                                                <form action="{{ route('user.import.excel', ['type' => 'storing_test']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" id="storing_test_file" required onchange="handleFileSelect(event)">
                                                    <div class="flex justify-center">
                                                        <button type="submit" id="storing_upload_button" style="display: none;" class="p-2 m-2 text-white bg-red-500 border-0 focus:outline-none
                                                        hover:bg-red-600 rounded">Upload Excel File</button>
                                                    </div>
                                                </form>
                                            </div> 
                                            @else
                                            <div class="flex justify-center">
                                                {{-- <button onclick="location.href='{{ route('user.show.table', ['id' => $experiment->id, 'type' => 'storing_test']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Table</button> --}}
                                                <button onclick="location.href='{{ route('user.show.chart', ['id' => $experiment->id, 'type' =>'storing_test']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Chart</button>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('user.edit_export.excel', ['experiment_id' => $experiment->id, 'type' => 'storing_test']) }}" class="btn btn-primary m-2">Download Now Data</a>                                          
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                        </div>
                                    
                                        
                                        

                                        <div class="mt-2 w-1/2 border-2 border-gray-300">
                                            <div class="flex justify-center bg-gray-200">
                                                <div class="p-1 w-full text-center ml-5">
                                                    Antibacteria Test
                                                </div>
                                                <div class="my-1 mr-2">
                                                    <form  id="delete_storing_test_{{ $experiment->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' => $experiment->id, 'type' => 'storing_test', 'id' => $experiment->id ])}}">
                                                        @csrf
                                                        @method('delete')  
                                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this, 'storing_test')" class="p-1 text-white bg-red-400 border-0 focus:outline-none text-xs text-center
                                                            hover:bg-red-500 rounded">Delete</a>
                                                    </form> 
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <div class="flex justify-center">
                                                    <button class="toggle-button p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none hover:bg-gray-600 rounded" data-target="antibacteria_test_button_{{$number_composition}}" >
                                                        Basic Information
                                                    </button>
                                                </div>
                                                <div id="antibacteria_test_button_{{$number_composition}}" style="display: none;">

                                                    @if($bacteria_test)

                                                    <table class="border w-full">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td class="px-2 py-2 text-center w-3/5">
                                                                    <p  style="word-wrap: break-word; max-width: 100%;">
                                                                    {{$bacteria_test->bacteria_detail->name}}
                                                                    </p>
                                                                
                                                                </td>
                                                                <td class="px-2 py-2 text-center">
                                                                    <div class="my-2 w-1/5">
                                                                        <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'antibacteria_test', 'id' => $bacteria_test->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                                            hover:bg-indigo-500 rounded w-20">Edit</button>
                                                                    </div> 
                                                                </td>
                                                                <td class="px-2 py-2 text-center">
                                                                    <div class="my-2 w-1/5">
                                                                        <form id="delete_bacteria_test_{{ $bacteria_test->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' =>$experiment->id, 'type' => 'bacteria_test', 'id' => $bacteria_test->id ])}}">
                                                                            @csrf
                                                                            @method('delete')  
                                                                            <a href="#" data-id="{{ $bacteria_test->id }}" onclick="deletePost(this, 'bacteria_test')" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                                                hover:bg-red-500 rounded">Delete</a>
                                                                        </form> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                    <div class="p-1 text-center">
                                                    @endif
                                                    @if($compositions->isNotEmpty())
                                                        <button type="button" data-toggle="modal" data-target="#antibacteria_test_{{$composition->id}}" class="text-black py-2 px-4 border-2 border-gray-400 hover:bg-gray-300 rounded">Add_Antibacteria_Test</button>
                                                    @endif
                                                    </div>
                                                </div>
                                            

                                            <div class="text-center">
                                                <a href="{{ route('user.export.excel', ['experiment_id' => $experiment->id, 'type' => 'storing_test']) }}" class="btn btn-primary m-2">Download Format Excel File</a>                                          
                                            </div>
                                            <div class="p-2">
                                                <form action="{{ route('user.import.excel', ['type' => 'storing_test']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" id="antibacteria_test_file" required onchange="handleFileSelect(event)">
                                                    <div class="flex justify-center">
                                                        <button type="submit" id="antibacteria_test_upload_button" style="display: none;" class="p-2 m-2 text-white bg-red-500 border-0 focus:outline-none
                                                        hover:bg-red-600 rounded">Upload Excel File</button>
                                                    </div>
                                                </form>
                                            </div> 
                                            {{-- @else
                                            <div class="flex justify-center">
                                                <button onclick="location.href='{{ route('user.show.table', ['id' => $experiment->id]) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Table</button>
                                                <button onclick="location.href='{{ route('user.show.chart', ['id' => $experiment->id]) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Chart</button>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('user.export.excel', ['experiment_id' => $experiment->id, 'type' => 'storing_test']) }}" class="btn btn-primary m-2">Download Now Data</a>                                          
                                            </div>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                </div>
                                



                                <div class="p-1 text-center">
                                    <button type="button" onclick="location.href='{{ route('user.profile.index')}}'" class="my-2 h-9 text-white bg-gray-400 border-0 px-4 focus:outline-none
                                    hover:bg-gray-500 rounded">Back</button>
                                </div>


                                
                           
                    </section>
                </div>
            </div>
        </div>
    </div> 


<script>
    function deletePost(e, type){
        'use strict'
        if(confirm('Are you sure you want to delete this ' + type + ' data?')){
            document.getElementById('delete_' + type + '_' + e.dataset.id).submit()
        }   
    }
    // function deletePost(e){
    //     'use strict'
    //     if(confirm('Are you sure you want to delete this Material data?')){
    //         document.getElementById('delete_material_' + e.dataset.id).submit()
    //     }   
    // }
    // function deletePost(e){
    //     'use strict'
    //     if(confirm('Are you sure you want to delete this Storing Test data?')){
    //         document.getElementById('delete_storing_test_' + e.dataset.id).submit()
    //     }
    // }
    // function deletePost(e){
    //     'use strict'
    //     if(confirm('Are you sure you want to delete this Antibacteria Test data?')){
    //         document.getElementById('delete_bacteria_test_' + e.dataset.id).submit()
    //     }
    // }
</script>
 
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleButtons = document.querySelectorAll('.toggle-button');
    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var targetId = this.dataset.target; // ボタンのdata-target属性に設定されたIDを取得
            var targetElement = document.getElementById(targetId);
            if (targetElement.style.display === 'none') {
                targetElement.style.display = 'block';
            } else {
                targetElement.style.display = 'none';
            }
        });
    });
});
</script>
<script>

    function handleFileSelect(event) {
        var targetInput = event.target;
        var targetButtonId = '';

        if(targetInput.id === 'characteristic_test_file') {
            targetButtonId = 'characteristic_test_upload_button';
        }else if(targetInput.id === 'storing_test_file') {
            targetButtonId = 'storing_upload_button';
        }else if(targetInput.id === 'antibacteria_test_file') {
            targetButtonId = 'antibacteria_upload_button';
        }else if(targetInput.id === 'film_condition_file') {
            targetButtonId = 'film_condition_upload_button';
        }
    
        var uploadButton = document.getElementById(targetButtonId);
        if(uploadButton){
            uploadButton.style.display = 'block';
        }
    }
</script>


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript (Popper.jsとjQueryが必要) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>

