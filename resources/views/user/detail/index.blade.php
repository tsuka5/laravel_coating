<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <x-flash-message status="session('status')"/>
                            {{-- <div class='flex justify-end mb-4'>
                                <button onclick="location.href='{{ route('user.detail.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                            </div> --}}
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            
                            <div class="flex justify-center flex-wrap flex-row ml-3">
                            
                                <div class="container border border-gray-500 w-2/5 mb-6 rounded-xl ml-6">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                        <th class="px-4 py-3 flex justify-center title-font tracking-wider font-medium text-gray-900 text-sm bg-red-100 rounded-tl rounded-bl">Matarial</th>
                                        {{-- <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materials as $material)
                                            <tr>
                                                <td class="px-4 py-3 flex justify-center">{{ $material->name }}</td>
                                                {{-- <td class="px-4 py-3">
                                                    <button onclick="location.href='{{ route('admin.users.edit', ['user' => $user->id])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Edit</button>
                                                </td> --}}
                                                {{-- <form id="delete_{{ $user->id }}" method="post" action="{{ route('admin.users.destroy', ['user' => $user->id ])}}">
                                                    @csrf
                                                    @method('delete')  --}}
                                                    {{-- リソースコントローラに渡す時だけ必要になる。それ以外はそれぞれのメソッドに合わせる。 --}}
                                                    {{-- <td class="px-4 py-3">
                                                        <a href="#" data-id="{{ $user->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                                    </td>
                                                </form> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    </table>
                                    <div class="mr-2 ml-2">
                                        {{ $materials->links() }}
                                    </div>
                                    <HR>
                                    <div class='flex justify-center mt-2'>
                                        <button onclick="location.href='{{ route('user.detail.create', ['formType'=>'material'])}}'" class="mb-3 mt-2 text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Add_Material</button>
                                    </div>
                                </div>
                                    
                        


                                <div class="container border border-gray-500 w-2/5 mb-6 rounded-xl ml-6">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                        <th class="px-4 py-3 flex justify-center title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100 rounded-tl rounded-bl">Additive</th>
                                        {{-- <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($additives as $additive)
                                            <tr>
                                                <td class="px-4 py-3 flex justify-center">{{ $additive->name }}</td>
                                                {{-- <td class="px-4 py-3">
                                                    <button onclick="location.href='{{ route('admin.users.edit', ['user' => $user->id])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Edit</button>
                                                </td> --}}
                                                {{-- <form id="delete_{{ $user->id }}" method="post" action="{{ route('admin.users.destroy', ['user' => $user->id ])}}">
                                                    @csrf
                                                    @method('delete')  --}}
                                                    {{-- リソースコントローラに渡す時だけ必要になる。それ以外はそれぞれのメソッドに合わせる。 --}}
                                                    {{-- <td class="px-4 py-3">
                                                        <a href="#" data-id="{{ $user->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                                    </td>
                                                </form> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    </table>
                                    <div class="mr-2 ml-2">
                                        {{ $additives->links() }}
                                    </div>
                                    <HR>
                                    <div class='flex justify-center mt-2'>
                                        <button onclick="location.href='{{ route('user.detail.create', ['formType'=>'additive'])}}'" class="mb-3 mt-2 text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Add_Additive</button>
                                    </div>
                                </div>
                        
                        
                        


                        
                                <div class="container border border-gray-500 w-2/5 mb-6 rounded-xl ml-6">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                        <th class="px-4 py-3 flex justify-center title-font tracking-wider font-medium text-gray-900 text-sm bg-green-100 rounded-tl rounded-bl">Fruit and Vegitable</th>
                                        {{-- <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fruits as $fruit)
                                            <tr>
                                                <td class="px-4 py-3 flex justify-center">{{ $fruit->name }}</td>
                                                {{-- <td class="px-4 py-3">
                                                    <button onclick="location.href='{{ route('admin.users.edit', ['user' => $user->id])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Edit</button>
                                                </td> --}}
                                                {{-- <form id="delete_{{ $user->id }}" method="post" action="{{ route('admin.users.destroy', ['user' => $user->id ])}}">
                                                    @csrf
                                                    @method('delete')  --}}
                                                    {{-- リソースコントローラに渡す時だけ必要になる。それ以外はそれぞれのメソッドに合わせる。 --}}
                                                    {{-- <td class="px-4 py-3">
                                                        <a href="#" data-id="{{ $user->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                                    </td>
                                                </form> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    </table>
                                    <div class="mr-2 ml-2">
                                        {{ $fruits->links() }}
                                    </div>
                                    <HR>
                                    <div class='flex justify-center mt-2'>
                                        <button onclick="location.href='{{ route('user.detail.create', ['formType'=>'fruit'])}}'" class="mb-3 mt-2 text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Add_Fruits Or Vegitable</button>
                                    </div>
                                </div>
                        


                        
                            <div class="container border border-gray-500 w-2/5 mb-6 rounded-xl ml-6">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                    <th class="px-4 py-3 flex justify-center title-font tracking-wider font-medium text-gray-900 text-sm bg-yellow-100 rounded-tl rounded-bl">Maicrobial</th>
                                    {{-- <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bacteria as $bacterium)
                                        <tr>
                                            <td class="px-4 py-3 flex justify-center">{{ $bacterium->name }}</td>
                                            {{-- <td class="px-4 py-3">
                                                <button onclick="location.href='{{ route('admin.users.edit', ['user' => $user->id])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Edit</button>
                                            </td> --}}
                                            {{-- <form id="delete_{{ $user->id }}" method="post" action="{{ route('admin.users.destroy', ['user' => $user->id ])}}">
                                                @csrf
                                                @method('delete')  --}}
                                                {{-- リソースコントローラに渡す時だけ必要になる。それ以外はそれぞれのメソッドに合わせる。 --}}
                                                {{-- <td class="px-4 py-3">
                                                    <a href="#" data-id="{{ $user->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                                </td>
                                            </form> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                                </table>
                                <div class="mr-2 ml-2">
                                    {{ $bacteria->links() }}
                                </div>
                                <HR>
                                <div class='flex justify-center mt-2'>
                                    <button onclick="location.href='{{ route('user.detail.create', ['formType'=>'bacteria'])}}'" class="mb-3 mt-2 text-white bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Add_Microbial</button>
                                </div>
                            </div>

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