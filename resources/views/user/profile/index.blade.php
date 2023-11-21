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
                       
                        {{-- <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                            <div class="sm:col-span-3">
                                <label for="af-account-full-name" class="inline-block text-sm text-gray-400 mt-2.5 dark:text-gray-200">
                                Full name
                                </label>
                            </div>
                            <!-- End Col -->
                    
                            <div class="sm:col-span-9 sm:flex af-account-full-name py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                {{ $userInformation->name }}
                            </div>
                            <!-- End Col -->
                    
                            <div class="sm:col-span-3">
                                <label for="af-account-email" class="inline-block text-sm text-gray-400 mt-2.5 dark:text-gray-200">
                                Email
                                </label>
                            </div>
                            <!-- End Col -->
                    
                            <div class="sm:col-span-9py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                {{ $userInformation->email }}
                            </div>
                        </div> --}}

                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                            {{-- <div class='flex justify-center mt-4 mb-4'>
                                <button onclick="location.href='{{ route('user.create.experiment') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                            </div> --}}
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
                                        <div class="justify-start">
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'material'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Material</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $materialCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'additive'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Additive</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $additiveCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'film_condition'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Film_Condition</button>
                                                <div class="rounded-full w-[30px] h-[30px] ml-4 mt-1 text-white bg-red-500"> <div class="flex justify-center mt-1">{{ $film_conditionCounts[$experiment->id] }}</div> </div>
                                            </div>
                                            <div class='flex justify-center mt-2'>
                                                <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'charactaristic_test'])}}'" class="text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Charactaristic_Test</button>
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
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                {{ $experiments->links() }}
                        </div>

                                    {{-- <tr>
                                        <td class="px-4 py-3">{{ $experiment->title }}</td>
                                        <td class="px-4 py-3">{{ $experiment->name }}</td>
                                        <td class="px-4 py-3">{{ $experiment->date }}</td>
                                        <td class="px-4 py-3">{{ $experiment->paper }}</td>
                                        <td class="px-4 py-3">
                                            <button onclick="location.href='{{ route('user.profile.edit', ['profile' => $experiment->id])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Edit</button>
                                            <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'material'])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Material</button>
                                            <div><i class="fas fa-database"></i> {{ $materialCounts[$experiment->id] }} </div>
                                            <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'additive'])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Additive</button>
                                            <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'film_condition'])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Film_Condition</button>
                                            <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'charactaristic_test'])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Charactaristic_test</button>
                                            <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'storing_test'])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Storing_test</button>
                                            <button onclick="location.href='{{ route('user.create', ['id' => $experiment->id, 'antibacteria_test'])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Antibacteria_test</button>
                                            {{-- <button onclick="location.href='{{ route('user.profile.create.additive_create', ['profile' => $experiment->id])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Additive</button> --}}
                                        {{-- </td>
                                        <form id="delete_{{ $experiment->id }}" method="post" action="{{ route('user.profile.destroy', ['profile' => $experiment->id ])}}">
                                            @csrf
                                            @method('delete')   --}}
                                            {{-- リソースコントローラに渡す時だけ必要になる。それ以外はそれぞれのメソッドに合わせる。 --}}
                                            {{-- <td class="px-4 py-3">
                                                <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                            </td>
                                        </form> 
                                    </tr>  --}}
                                
                            
                            {{-- </tbody>
                            </table> --}}
                            
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
