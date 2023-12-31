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
                            {{-- <h3 class="flex justify-center my-5 underline">To register a new experiment, start here</h3> --}}
                            <div class='flex justify-center mt-4 mb-4'>
                                <button onclick="location.href='{{ route('user.create.experiment') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Data_Entry</button>
                            </div>
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                           

                                <h3 class="flex justify-center my-5 underline">Your Experiment Data</h3>
                                
                                <div class="flex justify-center flex-wrap flex-row ml-3">
                                @foreach ($experiments as $experiment)
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
                                            <button onclick="location.href='{{ route('user.profile.edit', ['profile' => $experiment->id])}}'" class="mb-2 h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Edit</button>
                                            <form  class="mt-1.5" id="delete_{{ $experiment->id }}" method="post" action="{{ route('user.profile.destroy', ['profile' => $experiment->id ])}}">
                                                @csrf
                                                @method('delete')  
                                                <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this)" class="ml-2 text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                            </form> 
                                        </div> 
                                        <HR>
                                            
                                        <div class="justify-start  grid grid-cols-1 gap-y-2">
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'material'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded w-3/5">Material</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $materialCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'film_condition'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded w-3/5">Film_Condition</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $film_conditionCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'charactaristic_test'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded w-3/5">Characteristic_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $charactaristic_testCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'storing_test'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded w-3/5">Storing_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $storing_testCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'antibacteria_test'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded w-3/5">Antibacteria_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $antibacteria_testCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2 mb-4'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'note'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded w-3/5">Note</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $noteCounts[$experiment->id] }}</div> </div>
                                            </div>
                                        </div>
                                        {{-- <div class="justify-start">
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'material'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Material</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $materialCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'film_condition'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Film_Condition</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $film_conditionCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'charactaristic_test'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Characteristic_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $charactaristic_testCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'storing_test'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Storing_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $storing_testCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2 mb-4'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'antibacteria_test'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Antibacteria_Test</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $antibacteria_testCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2 mb-4'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'note'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Note</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $noteCounts[$experiment->id] }}</div> </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                @endforeach
                                </div>
                                {{ $experiments->links() }}
                            </div>
                            
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
