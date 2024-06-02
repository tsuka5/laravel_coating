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

                        <div class="container mx-auto">
                            <x-flash-message status="session('status')" />
                        
                            <div class="lg:w-1/2 mx-auto">

                                <div class="flex justify-center mt-2 p-1 w-full bg-gray-400">
                                    <div class="text-white mt-1 ">
                                        Experiment Information
                                    </div>
                                    {{-- <form  class="mt-1.5" id="delete_experiment_{{ $experiment->id }}" method="post" action="{{ route('user.destroy.data', ['experiment_id' => $experiment->id, 'type' =>'experiment', 'id' => $experiment->id ])}}">
                                        @csrf
                                        @method('delete')   
                                        <a href="#" data-id="{{ $experiment->id }}" onclick="deletePost(this, 'experiment')" class="h-9 text-white bg-red-400 border-0 px-4 focus:outline-none
                                            hover:bg-red-500 rounded">Delete_Experiment</a>
                                    </form>  --}}
                                    
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
                                <div class="flex justify-center my-3">                                
                                    <div class="flex justify-center flex-wrap lg:w-2/3 md:w-full mx-auto"> 
                                        @foreach($compositions as $composition)
                                        <div class="w-1/3">
                                            <div class="flex justify-center mt-2 p-1 w-full bg-gray-400">
                                                <div class="text-white">
                                                    Composition:{{$number_composition}}
                                                </div>
                                                                                            
                                            </div> 
                                            <div>
                                                <div class="border-2 border-gray-300">

                                                    <div class="flex-col" style="display: flex; flex-direction: column;">
                                                        
                                                        <div class="border">
                    
                                                            @foreach($materials[$composition->id] as $material)
                                                            <p class="text-center">
                                                                {{$material->material_detail->name}} : {{($material->concentration)}}
                                                            </p>
                                                            @endforeach
                                                            
                                                            
                                                    
                                                        
                                                        
                                                        </div>
                                                    </div>
                
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                        @endforeach
                                    </div>
                                </div>
                              
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                
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
                                                <div class="p-1 w-full text-center">
                                                    Film Condition
                                                </div>
                                            </div> 
                                            <div class="my-1 mr-2">
                                                <div class="flex justify-center">
                                                    <button onclick="location.href='{{ route('user.everyone_show.table', ['id' => $experiment->id, 'type' => 'film_condition']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                        hover:bg-gray-600 rounded">Show Table</button>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('user.edit_export.excel', ['experiment_id' => $experiment->id, 'type' => 'film_condition']) }}" class="btn btn-primary m-2">Download Now Data</a>                                          
                                            </div>


                                            
                                        </div>

                                        <div class="w-1/2 border-2 border-gray-300">
                                            <div class="flex justify-center bg-gray-200">
                                                <div class="p-1 w-full text-center">
                                                    Characteristic Test
                                                </div>
                                                <div class="my-1 mr-2">
                                                    
                                                </div>
                                            </div>

                                            @if($characteristic_test->isEmpty())
                                            <div class="text-center">
                                                No Data
                                            </div>
                                           
                                            @else
                                            <div class="flex justify-center">
                                                {{-- <button onclick="location.href='{{ route('user.show.table', ['id' => $experiment->id, 'type' => 'characteristic_test']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Table</button> --}}
                                                <button onclick="location.href='{{ route('user.everyone_show.chart', ['id' => $experiment->id, 'type' => 'characteristic_test']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Chart</button>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('user.edit_export.excel', ['experiment_id' => $experiment->id, 'type' => 'chacteristic_test']) }}" class="btn btn-primary m-2">Download Now Data</a>                                          
                                            </div>
                                            @endif
                                        </div>

                                        <div class="mt-2 w-1/2 border-2 border-gray-300">
                            
                                            <div class="flex justify-center bg-gray-200">
                                                <div class="p-1 w-full text-center">
                                                    Storing Test
                                                </div>
                                                
                                            </div>
                                    
                                            
                                            @if($storing_test->isEmpty())
                                            <div class="text-center">
                                                No data
                                            </div>
                                            
                                            @else
                                            <div class="flex justify-center">
                                                <button onclick="location.href='{{ route('user.everyone_show.chart', ['id' => $experiment->id, 'type' =>'storing_test']) }}';"class="p-2 m-2 text-white bg-gray-500 border-0 focus:outline-none
                                                    hover:bg-gray-600 rounded">Show Chart</button>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('user.edit_export.excel', ['experiment_id' => $experiment->id, 'type' => 'storing_test']) }}" class="btn btn-primary m-2">Download Now Data</a>                                          
                                            </div>
                                            @endif
                                    
                                        </div>
                                        

                                        <div class="mt-2 w-1/2 border-2 border-gray-300">
                                            <div class="flex justify-center bg-gray-200">
                                                <div class="p-1 w-full text-center">
                                                    Antibacteria Test
                                                </div>
                                               
                                            </div>

                                            {{-- @if($storing_test->isEmpty()) --}}
                                            <div class="text-center">
                                                No data
                                            </div>
                                            <div class="p-2">
                                                
                                            </div> 
                                           
                                        </div>
                                    </div>
                                </div>
                                </div>
                                



                                <div class="p-1 text-center">
                                    <button type="button" onclick="location.href='{{ route('user.search.index')}}'" class="my-2 h-9 text-white bg-gray-400 border-0 px-4 focus:outline-none
                                    hover:bg-gray-500 rounded">Back</button>
                                </div>


                                
                           
                    </section>
                </div>
            </div>
        </div>
    </div> 

 
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

