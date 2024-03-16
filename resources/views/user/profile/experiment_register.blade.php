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

                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                        
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <div class="right-2">
                                    <form  class="mt-1.5" id="delete_experiment_{{ $experiment->id }}" method="post" action="{{ route('user.destroy.data', ['experiment_id' => $experiment->id, 'type' =>'experiment', 'id' => $experiment->id ])}}">
                                        @csrf
                                        @method('delete')   
                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this, 'experiment')" class="h-9 text-white bg-red-400 border-0 px-4 focus:outline-none
                                            hover:bg-red-500 rounded">Delete_Experiment</a>
                                    </form> 
                                </div>
                                <div class="flex justify-center border-2 border-gray-500 rounded divide-x divide-gray-500">
                                @if ($experiment->paper_url === null)
                                    <div class="flex justify-center border-2 bg-gray-200 p-3 w-3/4">
                                        <p class="text-center p-2">Your Experiment : {{$experiment->title}}</p>
                                    </div>
                                @else
                                    <div class="flex justify-center items-center border-2 bg-gray-200 w-3/4">
                                        <div class="flex-col">
                                            <p class="text-center p-2">Paper : {{$experiment->title}}<p>
                                            {{-- <HR class="text-black">
                                            <p class="text-center">{{$experiment->paper_url}}<p> --}}
                                        </div>
                                    </div>
                                @endif
                            
                                    <div class="w-1/3">
                                        <button class="toggle-button p-1 underline w-full hover:text-indigo-400" data-target="condition_button" >
                                            Film Condition
                                        </button>
                                        <div id="condition_button" style="display: none;">
                                            @if($film_condition_data !== null)
                                            <table class="flex justify-center">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2 py-2 text-center">
                                                            <div class="flex justify-center my-2">
                                                                <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'film_condition', 'id' => $film_condition_data->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                                    hover:bg-indigo-500 rounded w-20">Edit</button>
                                                            </div> 
                                                        </td>
                                                        <td class="px-2 py-2 text-center">
                                                            <div class="flex justify-center my-2">
                                                                <form  id="delete_film_condition_{{ $film_condition_data->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' =>$experiment->id, 'type' => 'film_condition', 'id' => $film_condition_data->id ])}}">
                                                                    @csrf
                                                                    @method('delete')  
                                                                    <a href="#" data-id="{{ $film_condition_data->id }}" onclick="deletePost(this, 'film_condition')" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                                        hover:bg-red-500 rounded">Delete</a>
                                                                </form> 
                                                            </div>
                                                        </td>
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="p-1 flex justify-center">
                                                <button type="button" data-toggle="modal" data-target="#film_condition" class="text-black py-2 border-2 border-gray-400 hover:bg-gray-300 rounded w-40">Add_Film_condition</button>                                            
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                


                                @php
                                    $number_composition = 1;
                                @endphp


                                <div class="lg:w-2/3 md:w-2/3 w-full mx-auto overflow-auto">

                                    @foreach($compositions as $composition) 
                                    <div class="flex justify-center mt-2 p-1 w-full bg-gray-300 hover:bg-gray-400">
                                        <button class="toggle-button text-white" data-target="composition_button{{$number_composition}}" >
                                            Composition:{{$number_composition}}
                                        </button>
                                        
                                            <form  id="delete_composition_{{ $composition->id }}" method="post" action="{{ route('user.destroy.data', [ 'experiment_id' => $experiment->id, 'type' => 'composition', 'id' => $composition->id ])}}">
                                                @csrf
                                                @method('delete')  
                                                <a href="#" data-id="{{ $composition->id }}" onclick="deletePost(this, 'composition')" class="mb-2 ml-10 text-white bg-red-400 border-0 py-1 px-1 focus:outline-none text-xs
                                                    hover:bg-red-500 rounded">Delete</a>
                                            </form>
                                        
                                    </div> 
                                    <div id="composition_button{{$number_composition}}" style="display: none;">
                                        <div class="border-2 border-gray-300">

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

                                            <div class='flex-col'>
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
                                            
                                                
            





                                                <div class="mt-2">
                                                    @php
                                                        $number_material=1;
                                                    @endphp
                                                    <button class="toggle-button p-1 underline w-full bg-gray-200 hover:text-indigo-400" data-target="material_button_{{$number_composition}}" >
                                                        Material
                                                    </button>
                                                    <div id="material_button_{{$number_composition}}" style="display: none;">

                                                        @foreach($materials[$composition->id] as $material)
                                                        <table class="border w-full">
                                                            <tbody>
                                                                
                                                                <tr>
                                                                    <td class="w-3/5">
                                                                        <p class="px-2 text-center mt-3"  style="word-wrap: break-word; max-width: 100%;">
                                                                             {{$material->material_detail->name}}
                                                                        </p>
                                                                    </td>
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


                                            
                                                <div class="mt-2">
                                                    <button class="toggle-button p-1 underline w-full bg-gray-200 hover:text-indigo-400" data-target="storing_test_button_{{$number_composition}}" >
                                                        Storing Test
                                                    </button>
                                                    <div id="storing_test_button_{{$number_composition}}" style="display: none;">
                                                        @foreach($storing_tests[$composition->id] as $storing_test)
                                                        <table class="border w-full">
                                                            <tbody>
                                                                
                                                                <tr>
                                                                    <td class="w-3/5">
                                                                        <p class="px-2 text-center mt-3" style="word-wrap: break-word; max-width: 100%;">
                                                                            Day{{$storing_test->storing_day}} 
                                                                        </p>
                                                                    </td>
                                                                    <td class="px-2 text-center">
                                                                        <div class="my-2 w-1/5">
                                                                            <button onclick="location.href='{{ route('user.edit.experiment', ['editType' => 'storing_test', 'id' => $storing_test->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                                                hover:bg-indigo-500 rounded w-20">Edit</button>
                                                                        </div> 
                                                                    </td>
                                                                    <td class="px-2 text-center">
                                                                        <div class="w-1/5">
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
                                                        @endforeach
                                                        <div class="p-1 text-center">
                                                            <button type="button" data-toggle="modal" data-target="#storing_test_{{$composition->id}}" class="text-black px-4 py-2 border-2 border-gray-400 hover:bg-gray-300 rounded">Add_days</button>                                          
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                    
                                            


                                                <div class="mt-2">
                                                    <button class="toggle-button p-1 underline w-full bg-gray-200 hover:text-indigo-400" data-target="antibacteria_test_button_{{$number_composition}}" >
                                                        Antibacteria Test
                                                    </button>
                                                    <div id="antibacteria_test_button_{{$number_composition}}" style="display: none;">

                                                        @foreach($bacteria_tests[$composition->id] as $bacteria_test)
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
                                                        @endforeach
                                                        <div class="p-1 text-center">
                                                            <button type="button" data-toggle="modal" data-target="#antibacteria_test_{{$composition->id}}" class="text-black py-2 px-4 border-2 border-gray-400 hover:bg-gray-300 rounded">Add_Antibacteria_Test</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                




                                                <div class="modal fade" id="characteristic_test_{{$composition->id}}" tabindex="-1" aria-labelledby="characteristicTestLabel" aria-hidden="true">
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
                                                </div>




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
                                                            @include('layouts.create_form', ['formType' => 'storing_test', 'id' => $composition->id])
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>


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
                                                </div>



                                                

                                                


                                        </div>
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                    </div>
                                </div>
                                @endforeach
                                <div class="flex justify-center">
                                    <form method="post" action="{{ route('user.profile.create.composition', ['experiment_id'=> $experiment->id]) }}">
                                    @csrf
                                        <button otype="submit" class="mt-4 h-9 text-white bg-green-400 border-0 py-2 px-4 focus:outline-none
                                            hover:bg-green-500 rounded">+Add Composition</button>
                                    </form>
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

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript (Popper.jsとjQueryが必要) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>

