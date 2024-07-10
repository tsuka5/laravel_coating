


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tga Test Chart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">

                            {{-- <div class="flex flex-col text-center w-full mb-4 mt-12">
                                <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                            </div> --}}


                            @php
                                $number_composition = 1;
                            @endphp
                            <div class="flex justify-center mt-5">                                
                                <div class="flex justify-center flex-wrap lg:w-2/3 md:w-full"> 
                                    @foreach($compositions as $composition)
                                    <div class="w-1/3">
                                        <div class="flex justify-center mt-2 p-1 w-full bg-gray-400">
                                            <div class="text-white">
                                                Composition:{{$number_composition}}
                                            </div>
                                        </div> 
                                        <div>
                                            <div class="border-1 border-gray-300">

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
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $number_composition += 1;
                                    @endphp
                                    @endforeach
                                </div>
                            </div>
                            

                            <div class = "flex justify-center flex-wrap">
                                {{-- 酵素活性のグラフ --}}
                                <canvas id="mass_loss_rate" width="400" height="400" class="m-10"></canvas>
                            </div>

                            <div class="p-2 w-full flex justify-around mt-4">
                              <button onclick="location.href='{{ route('user.experiment_register', ['experiment_id'=>$experiment->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded my-2">Back</button>
                            </div>
                        </div>
                           
                    </section>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

const colors = [
    'rgba(255, 99, 132, 0.8)', // red
    'rgba(54, 162, 235, 0.8)', // blue
    'rgba(255, 206, 86, 0.8)',  // yellow
    'rgba(75, 192, 192, 0.8)',  // green
    'rgba(153, 102, 255, 0.8)', // purple
    'rgba(255, 159, 64, 0.8)',  // orange
    'rgba(199, 199, 199, 0.8)', // grey
    'rgba(83, 102, 255, 0.8)',  // dark blue
    'rgba(255, 99, 204, 0.8)',  // pink
    'rgba(210, 99, 132, 0.8)'   // mauve
];

const borderColors = [
    'rgba(255, 99, 132, 1)', // red
    'rgba(54, 162, 235, 1)', // blue
    'rgba(255, 206, 86, 1)',  // yellow
    'rgba(75, 192, 192, 1)',  // green
    'rgba(153, 102, 255, 1)', // purple
    'rgba(255, 159, 64, 1)',  // orange
    'rgba(199, 199, 199, 1)', // grey
    'rgba(83, 102, 255, 1)',  // dark blue
    'rgba(255, 99, 204, 1)',  // pink
    'rgba(210, 99, 132, 1)'   // mauve
];

// 変数をコントローラから受け取る
const composition_count_list = @json($composition_count_list);
const x_label = @json($x_label);
const temperature = @json($temperatures);
const mass_loss_rate = @json($mass_loss_rates);
const mass_loss_rate_datasets = [];

composition_count_list.forEach((composition_count, index) => {
    mass_loss_rate_datasets.push({
        label: `composition: ${composition_count}`,
        data: mass_loss_rate[index],
        backgroundColor: colors[index % colors.length],
        borderColor: borderColors[index % borderColors.length],
        borderWidth: 1
    });
});


function createLineChart(chartId, datasets, title, labels) {
   
   var ctx = document.getElementById(chartId).getContext('2d');
   return new Chart(ctx, {
       type: 'line', // グラフのタイプ
       data: {
           labels: labels, // x軸ラベル
           datasets: datasets  //データセット配列
       },
       options: {
           responsive: false,
           maintainAspectRatio: false,
           scales: {
               y: {
                   beginAtZero: true
               }
           },
           plugins: {
               title: {
                   display: true,
                   text: title,
                   font: {
                       size: 16
                   },
                   padding: {
                       top: 20,
                       bottom: 30
                   },
                   color: '#111'
               }
           }
       }

   });
}
var mass_loss_rateChart = createLineChart('mass_loss_rate', mass_loss_rate_datasets, 'mass_loss_rate', temperature);

</script>







                            