<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your Profile
        </h2>
    </x-slot>
    <div class="mb-2 py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="justify-center p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">

                    <div>
                        <x-flash-message status="session('status')" />
                        <div class="flex justify-center">
                            <div class='flex-col mt-4 mb-4'>
                                <div class="flex justify-center">
                                    <p class="underline">Please Start here</p>
                                </div>
                                <div class="flex">
                                    <div class="flex justify-center p-3">
                                        <button onclick="location.href='{{ route('user.create.experiment', ['experiment']) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-80">Your Experiment Data Entry</button>
                                    </div>
                                    <div class="flex justify-center">
                                        <button class="text-black bg-white border-0 py-2 px-4 focus:outline-none rounded">Or</button>
                                    </div>
                                    <div class="flex justify-center p-3">
                                        <button onclick="location.href='{{ route('user.create.experiment', ['paper']) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-80">Paper Data Entry</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                        <div class="w-2/3 flex justify-center flex-wrap">
                        @foreach($experiments as $experiment)   
                            <div class="w-1/3 border-2 border-gray-300 rounded mx-4 my-4 divide-y-2 divide-gray-300">
                                @if ($experiment->paper_url === null)
                                    <div class="flex justify-center bg-gray-200 p-1">
                                        <p>Your Experiment</p>
                                    </div>
                                @else
                                    <div class="flex justify-center bg-gray-200 p-1">
                                        <p>Paper<p>
                                    </div>
                                @endif
                                    <div class="mx-2 text-center">
                                        <p>Title :  {{$experiment->title}}</p>
                                    </div>
                                    <div class="p-2">
                                        <p class="bg-gray-400 rounded text-white mt-1 text-center mx-2"> KeyWord</p>
                                        @foreach($compositions[$experiment->id] as $composition)
                                            @foreach($materials[$composition->id] as $material) 
                                            <div>
                                                <p class="text-black border-2 bg-red-100 border-gray-400 text-center rounded mx-2 my-1">{{$material->material_detail->name}}</p>
                                            </div> 
                                            @endforeach
                                            @foreach($fruits[$composition->id] as $fruit) 
                                            <div>
                                                <p class="text-black border-2 bg-green-100 border-gray-400 text-center rounded mx-2 my-1">{{$fruit->fruit_detail->name}}</p>
                                            </div> 
                                            @break
                                            @endforeach
                                            @foreach($bacteria[$composition->id] as $bacterium) 
                                            <div>
                                                <p class="text-black border-2 bg-yellow-100 border-gray-400 text-center rounded mx-2 my-1">{{$bacterium->bacteria_detail->name}}</p>
                                            </div> 
                                            @endforeach

                                        @break
                                        @endforeach
                                    </div>
                                    <div class="flex justify-center">
                                        <button onclick="location.href='{{ route('user.experiment_register', ['experiment_id'=>$experiment->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded my-2">Go to this Experiment</button>
                                    </div>
                            </div>
                        @endforeach

                        </div>
                        </div>

                        {{-- <div class="w-1/2 flex">
                            @foreach($experiments as $experiment)  
                            <div>
                                <div class="right-2">
                                    <form  class="mt-1.5" id="delete_{{ $experiment->id }}" method="post" action="{{ route('user.profile.destroy.experiment', ['id' => $experiment->id ])}}">
                                        @csrf
                                        @method('delete')   
                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this)" class="h-9 text-white bg-red-400 border-0 px-4 focus:outline-none
                                            hover:bg-red-500 rounded">Delete_Experiment</a>
                                    </form> 
                                </div>
                                <div class="w-1/3 flex justify-center flex-col border-2 border-gray-500 rounded divide-y divide-gray-500 mb-5">
                                        @if ($experiment->paper_url === null)
                                            <div class="flex justify-center bg-gray-200 p-3">
                                                <p>Your Experiment: {{$experiment->title}}</p>
                                            </div>
                                        @else
                                            <div class="flex justify-center bg-gray-200 p-3">
                                                <p>Paper: {{$experiment->title}}<p>
                                            </div>
                                        @endif
                                            <button onclick="location.href='{{ route('user.experiment_register', ['experiment_id'=>$experiment->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg w-80">Go to this Experiment</button>

                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach($compositions[$experiment->id] as $composition)
                                            <div class="flex divide-x divide-gray-500">

                                                <div class="w-1/4 flex-col items-center divide-y divide-gray-500 ">
                                                    <div class="flex justify-center bg-gray-100">
                                                        <p>
                                                            Composition:{{$number}}
                                                        </p>
                                                    </div>
                                                    <div class="flex-col p-3" style="word-wrap: break-word; max-width: 100%; overflow: hidden;">
                                                        <div class="flex-col" style="word-wrap: break-word; max-width: 100%; overflow: hidden;">
                                                            @foreach($materials[$composition->id] as $material)
                                                            <p  style="word-wrap: break-word; max-width: 100%;">
                                                                {{$material->material_detail->name}} :<br> <p class="text-red-500">{{($material->concentration)}}</p>
                                                            </p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="w-3/5 flex-col">
                                                    <div class="p-3 flex">
                                                        <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'material'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Material</button>
                                                        <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $materialCounts[$composition->id] }}</div> </div>
                                                    </div>
                                                    <div class="p-3 flex">
                                                        <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'charactaristic_test'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Characteristic_Test</button>
                                                        <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $charactaristic_testCounts[$composition->id] }}</div> </div>
                                                        <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'storing_test'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40 ml-3">Storing_Test</button>
                                                        <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $storing_testCounts[$composition->id] }}</div> </div>
                                                    </div>
                                                    <div class="p-3 flex">
                                                        <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'antibacteria_test'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Antibacteria_Test</button>
                                                        <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $antibacteria_testCounts[$composition->id] }}</div> </div>
                                                        <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'note'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40 ml-3">Note</button>
                                                        <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $noteCounts[$composition->id] }}</div> </div>

                                                    </div>
                                                </div>
                                                <div class="p-3 w-auto flex flex-col justify-center items-center gap-4">
                                                        <button onclick="location.href='{{ route('user.profile.edit', ['profile' => $composition->id])}}'" class="mb-2 h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                            hover:bg-indigo-500 rounded w-20">Edit</button>
                                                        
                                                        <form  class="mt-1.5" id="delete_{{ $composition->id }}" method="post" action="{{ route('user.profile.destroy', ['profile' => $composition->id ])}}">
                                                            @csrf
                                                            @method('delete') 
                                                            <a href="#" data-id="{{ $composition->id }}" onclick="deletePost(this)" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                                hover:bg-red-500 rounded">Delete</a>
                                                        </form> 
                                                   
                                                        <button onclick="location.href='{{ route('user.profile.show', ['id' => $composition->id])}}'" class="mt-2 mb-2 h-9 text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none
                                                        hover:bg-gray-500 rounded w-20">Show</button>
                                                
                                                </div>

                                            </div>
                                            @php
                                                $number += 1;
                                            @endphp
                                        @endforeach
                                    <div class="flex justify-center">
                                        <form method="post" action="{{ route('user.profile.create.composition', ['experiment_id'=> $experiment->id]) }}">
                                        @csrf
                                            <button otype="submit" class="my-4 h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                hover:bg-indigo-500 rounded">+Add Composition</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> --}}

                            {{ $experiments->links() }}

                            
                    </div>
                
                    </section>
                </div>
            </div>
        </div>
    </div> 
    <script>
        function deletePost(e){
            'use strict'
            if(confirm('Are you sure you want to delete this data?')){
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>
    <script>
        // モーダルを閉じるためのJavaScriptの処理
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    
        function openModal() {
            myModal.show();
        }
    
        function closeModal() {
            myModal.hide();
        }
    </script>
</x-app-layout>

