<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Card Section -->
                    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                        {{-- <div class="mb-8">
                            <h6 class="text-sm text-gray-800 dark:text-gray-400">
                            Your information
                            </h6>
                        </div> --}}
                        <!-- Card -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                            
                    
                       
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
                            <!-- End Col -->
                        </div>
                        <!-- End Card -->
                    </div>
  <!-- End Card Section -->
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        <div class="mb-8">
                            <h6 class="text-sm text-gray-800 dark:text-gray-400">
                            Your experiments
                            </h6>
                        </div>
                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                            <div class='flex justify-end mb-4'>
                                <button onclick="location.href='{{ route('user.profile.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                            </div>
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
                                @foreach ($experiments as $experiment)
                                    <tr>
                                        <td class="px-4 py-3">{{ $experiment->title }}</td>
                                        <td class="px-4 py-3">{{ $experiment->name }}</td>
                                        <td class="px-4 py-3">{{ $experiment->date }}</td>
                                        <td class="px-4 py-3">{{ $experiment->paper }}</td>
                                        <td class="px-4 py-3">
                                            <button onclick="location.href='{{ route('user.profile.edit', ['profile' => $experiment->id])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Edit</button>
                                        </td>
                                        <form id="delete_{{ $experiment->id }}" method="post" action="{{ route('user.profile.destroy', ['profile' => $experiment->id ])}}">
                                            @csrf
                                            @method('delete')  
                                            {{-- リソースコントローラに渡す時だけ必要になる。それ以外はそれぞれのメソッドに合わせる。 --}}
                                            <td class="px-4 py-3">
                                                <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                            </td>
                                        </form> 
                                    </tr>
                                @endforeach

                            </tbody>
                            </table>
                            {{-- {{ $experiments->links() }} --}}
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
