<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your Profile
        </h2>
    </x-slot>
    <div class="mb-2 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="justify-center p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">

                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                        <div class=" flex justify-center">
                            <div class='flex-col mt-4 mb-4'>
                                <div class="flex justify-center">
                                    <p class="underline">Please Start here</p>
                                </div>
                                {{-- <div class="border-2 border-gray-500"> --}}
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
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            @foreach($experiments as $experiment)  
                                <div class="right-2">
                                    <form  class="mt-1.5" id="delete_{{ $experiment->id }}" method="post" action="{{ route('user.profile.destroy.experiment', ['id' => $experiment->id ])}}">
                                        @csrf
                                        @method('delete')   
                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this)" class="h-9 text-white bg-red-400 border-0 px-4 focus:outline-none
                                            hover:bg-red-500 rounded">Delete_Experiment</a>
                                    </form> 
                                </div>
                                <div class="flex justify-center flex-col border-2 border-gray-500 rounded divide-y divide-gray-500 mb-5">
                                    @if ($experiment->paper_url === null)
                                        <div class="flex justify-center bg-gray-200 p-3">
                                            <p>Your Experiment: {{$experiment->title}}</p>
                                        </div>
                                    @else
                                        <div class="flex justify-center bg-gray-200 p-3">
                                            <p>Paper: {{$experiment->title}}<p>
                                        </div>
                                    @endif

                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach($compositions[$experiment->id] as $composition)
                                        <div class="flex divide-x divide-gray-500">

                                            <div class="w-1/4 flex-col items-center divide-y divide-gray-500 ">
                                                <div class="flex justify-center bg-gray-100">
                                                    {{-- <p class="underline"> --}}
                                                    <p>
                                                        Composition:{{$number}}
                                                    </p>
                                                </div>
                                                <div class="flex-col p-3" style="word-wrap: break-word; max-width: 100%; overflow: hidden;">
                                                    @foreach($materials[$composition->id] as $material)
                                                    <p  style="word-wrap: break-word; max-width: 100%;">
                                                        {{$material->material_detail->name}} :<br> <p class="text-red-500">{{($material->concentration)}}</p>
                                                    </p>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="w-3/5 flex-col">
                                                <div class="p-3 flex">
                                                    <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'material'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Material</button>
                                                    <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $materialCounts[$composition->id] }}</div> </div>
                                                    <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'film_condition'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40 ml-3">Film_Condition</button>
                                                    <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $film_conditionCounts[$composition->id] }}</div> </div>
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
                                            <div class="p-3 w-auto flex-col">
                                                <div class="flex justify-center my-2">
                                                    <button onclick="location.href='{{ route('user.profile.edit', ['profile' => $composition->id])}}'" class="mb-2 h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                        hover:bg-indigo-500 rounded w-20">Edit</button>
                                                    
                                                </div> 
                                                <div class="flex justify-center my-2">
                                                    <form  class="mt-1.5" id="delete_{{ $composition->id }}" method="post" action="{{ route('user.profile.destroy', ['profile' => $composition->id ])}}">
                                                        @csrf
                                                        @method('delete')  
                                                        <a href="#" data-id="{{ $composition->id }}" onclick="deletePost(this)" class="mb-2 h-9 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none
                                                            hover:bg-red-500 rounded">Delete</a>
                                                    </form> 
                                                </div>
                                                <div class="flex justify-center mt-6 my-2">
                                                    <button onclick="location.href='{{ route('user.profile.show', ['id' => $composition->id])}}'" class="mb-2 h-9 text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none
                                                    hover:bg-gray-500 rounded w-20">Show</button>
                                                </div>
                                            </div>

                                        </div>
                                        @php
                                            $number += 1;
                                        @endphp
                                    @endforeach
                                <div class="flex justify-center">
                                    {{-- {{dd($experiment->id)}} --}}
                                    <form method="post" action="{{ route('user.profile.create.composition', ['experiment_id'=> $experiment->id]) }}">
                                    @csrf
                                        <button otype="submit" class="my-4 h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                            hover:bg-indigo-500 rounded">+Add Composition</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>

                            {{ $experiments->links() }}


















                        {{-- <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                           

                                
                                <div class="flex justify-center flex-wrap flex-row ml-3">
                                @foreach ($compositions as $composition)
                                    <div class="container border border-gray-500 w-2/5 mb-6 rounded-xl ml-6">
                                        <div class='flex justify-start mx-10'>
                                            <div>
                                                <label for="af-account-full-name" class="inline-block text-sm text-gray-400 mt-4 dark:text-gray-200">Title</label>
                                                <div class="py-1 px-1 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg
                                                last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative 
                                                focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"> 
                                                {{ $experiment->title }} </div>
                                                <label for="af-account-full-name" class="inline-block text-sm text-gray-400 mt-1 dark:text-gray-200">Name</label>
                                                <div class="py-1 px-1  block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg
                                                last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative 
                                                focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"> 
                                                {{ $experiment->name }} </div>
                                                <label for="af-account-full-date" class="inline-block text-sm text-gray-400 mt-1 dark:text-gray-200">Date</label>
                                                <div class="mt-1 mb-2 px-1 block w-full border-gray-200 shadow-sm  first:rounded-t-lg
                                                last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative 
                                                focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"> 
                                                {{ $experiment->date }} </div>
                                            </div>
                                        </div>

                                      

                                        <div class="flex justify-center my-2">
                                            <button onclick="location.href='{{ route('user.profile.edit', ['profile' => $composition->id])}}'" class="mb-2 h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                 hover:bg-indigo-500 rounded">Edit</button>
                                            <form  class="mt-1.5" id="delete_{{ $composition->id }}" method="post" action="{{ route('user.profile.destroy', ['profile' => $composition->id ])}}">
                                                @csrf
                                                @method('delete')  
                                                <a href="#" data-id="{{ $composition->id }}" onclick="deletePost(this)" class="ml-2 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                            </form> 
                                        </div> 
                                        <HR>
                                            
                                        <div class="justify-start  grid grid-cols-1 gap-y-2">
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'material'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Material</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $materialCounts[$composition->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'film_condition'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Film_Condition</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $film_conditionCounts[$composition->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'charactaristic_test'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Characteristic_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $charactaristic_testCounts[$composition->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'storing_test'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Storing_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $storing_testCounts[$composition->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'antibacteria_test'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Antibacteria_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $antibacteria_testCounts[$composition->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2 mb-4'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $composition->id, 'note'])}}'" class="text-white bg-gray-400 py-2 hover:bg-gray-500 rounded w-40">Note</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $noteCounts[$composition->id] }}</div> </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                </div>
                                {{ $compositions->links() }}
                            </div> --}}
                            
                    </div>
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
</x-app-layout>
