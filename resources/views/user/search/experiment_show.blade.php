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
                        
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                
                                <div class="flex justify-center border-2 border-gray-500 rounded divide-x divide-gray-500">
                                @if ($experiment->paper_url === null)
                                    <div class="flex justify-center border-2 bg-gray-200 p-3 w-3/4">
                                        <p>Your Experiment : {{$experiment->title}}</p>
                                    </div>
                                @else
                                    <div class="flex justify-center items-center border-2 bg-gray-200 w-3/4">
                                        <p>Paper : {{$experiment->title}}<p>
                                    </div>
                                @endif
                            
                                    <div class="w-1/3 flex justify-center">
                                        @if(!empty($film_condition_data))
                                        <button onclick="location.href='{{ route('user.experiment_detail_show', ['type' => 'film_condition', 'id' => $film_condition_data->id])}}'" class="h-9 text-indigo-300 border-0 py-2 px-4 focus:outline-none
                                            hover:text-indigo-500 rounded" >
                                            Film Condition
                                        </button>
                                        @else
                                        <p class="h-9 text-black border-0 py-2 px-4 focus:outline-none
                                        rounded">Film Condition</p>
                                        @endif
                                    </div>
                                </div>
                                


                                @php
                                    $number_composition = 1;
                                @endphp


                                <div class="lg:w-2/3 md:w-2/3 mx-auto overflow-auto">

                                    @foreach($compositions as $composition) 
                                    <div class="flex justify-center mt-2 p-1 bg-gray-300 hover:bg-gray-400">
                                        <button class="toggle-button text-white w-full" data-target="composition_button{{$number_composition}}" >
                                            Composition:{{$number_composition}}
                                        </button>
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
                                                </div>
                                            </div>
                                            <div class="flex justify-center">
                                                <div class="mt-2 mx-2">
                                                    <button onclick="location.href='{{ route('user.experiment_detail_show', ['type' => 'characteristic_test', 'id' => $composition->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                        hover:bg-indigo-500 w-60 rounded" >
                                                        Characteristic Test
                                                    </button>
                                                </div>
                                            
                                                <div class="mt-2 mx-2">
                                                    <button onclick="location.href='{{ route('user.experiment_detail_show', ['type' => 'material', 'id' => $composition->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                        hover:bg-indigo-500 w-60 rounded" >
                                                        Material
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="flex justify-center">
                                                <div class="my-2 mx-2">
                                                    <button onclick="location.href='{{ route('user.experiment_detail_show', ['type' => 'storing_test', 'id' => $composition->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                        hover:bg-indigo-500 w-60 rounded" >
                                                        Storing Test
                                                    </button>
                                                    
                                                </div>
                                                <div class="my-2 mx-2">
                                                    <button onclick="location.href='{{ route('user.experiment_detail_show', ['type' => 'storing_test', 'id' => $composition->id])}}'" class="h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none
                                                        hover:bg-indigo-500 w-60 rounded" >
                                                        Antibacteria Test
                                                    </button>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        @php
                                            $number_composition += 1;
                                        @endphp
                                    </div>
                                
                                @endforeach
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

