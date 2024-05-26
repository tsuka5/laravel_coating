<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your Profile
        </h2>
    </x-slot>
    {{-- <div class="mb-2 py-6">
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
                        <div class="lg:w mx-auto flex justify-center flex-wrap">
                        @foreach($experiments as $experiment)   
                            <div class="lg:w-1/3 md:w-1/3 border-2 border-gray-300 rounded mx-4 my-4 divide-y-2 divide-gray-300">
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
                                        <button onclick="location.href='{{ route('user.experiment_register', ['experiment_id'=>$experiment->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded my-2">Edit</button>
                                    </div>
                            </div>
                        @endforeach

                        </div>
                        </div>

                            {{ $experiments->links() }}

                            
                    </div>
                
                    </section>
                </div>
            </div>
        </div>
    </div>  --}}

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
                                <div class="lg:w-full mx-auto flex justify-center flex-wrap gap-4">
                                    @foreach($experiments as $experiment)   
                                        <div class="lg:w-1/3 md:w-1/2 sm:w-full p-4">
                                            <div class="border-2 border-gray-300 rounded divide-y-2 divide-gray-300">
                                                @if ($experiment->paper_url === null)
                                                    <div class="flex justify-center bg-gray-200 p-1">
                                                        <p>Your Experiment</p>
                                                    </div>
                                                @else
                                                    <div class="flex justify-center bg-gray-200 p-1">
                                                        <p>Paper</p>
                                                    </div>
                                                @endif
                                                <div class="mx-2 text-center">
                                                    <p>Title :  {{$experiment->title}}</p>
                                                </div>
                                                <div class="p-2">
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
                                                    <button onclick="location.href='{{ route('user.experiment_register', ['experiment_id'=>$experiment->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded my-2">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

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

