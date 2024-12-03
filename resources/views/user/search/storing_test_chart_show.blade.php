


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Storing Test Chart
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
                            </div>


                            
                                    
                            
                            <div class="p-2 w-full flex justify-around mt-4">
                              <button onclick="location.href='{{ route('user.experiment_show', ['experiment_id'=>$experiment->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded my-2">Back</button>
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
    document.addEventListener("DOMContentLoaded", function() {
        const colors = [
            'rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)',
            'rgba(199, 199, 199, 0.8)', 'rgba(83, 102, 255, 0.8)', 'rgba(255, 99, 204, 0.8)',
            'rgba(210, 99, 132, 0.8)'
        ];

        const borderColors = colors.map(color => color.replace('0.8', '1'));

        const dataMap = {
            mass_loss_rate: @json($mass_loss_rates),
            color_e: @json($color_es),
            ph: @json($phs),
            moisture_content: @json($moisture_contents),
            ta: @json($tas),
            hardness: @json($hardnesses),
            vitamin_c: @json($vitamin_cs),
            rr: @json($rrs)
        };
        console.log(dataMap.hardness.flat());

        const labels = @json($days);
       
        const compositionCountList = @json($composition_count_list);

        function createDatasets(dataArray) {
            return compositionCountList.map((compositionCount, index) => ({
                label: `composition: ${compositionCount + 1}`,
                data: dataArray[index],
                backgroundColor: colors[index % colors.length],
                borderColor: borderColors[index % colors.length],
                borderWidth: 1
            }));              
        }

        function createCanvas(id){
            const canvas = document.createElement('canvas');
            canvas.id = id;
            canvas.width = 400;
            canvas.height = 400;
            canvas.classList.add('m-10');
            return canvas;
        }

        function getMinMax(data) {
            const allValues = data.flat().filter(value => value !== null && !isNaN(value));
            const min = Math.min(...allValues);
            const max = Math.max(...allValues);

            const padding = (max - min) * 0.1;
            return { min: min - padding, max: max + padding };
        }

        function createLineChart(chartId, datasets, title, min, max) {
            const ctx = document.getElementById(chartId).getContext('2d');
            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: min,
                            max: max
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: title,
                            font: { size: 16 },
                            padding: { top: 20, bottom: 30 },
                            color: '#111'
                        }
                    }
                }
            });
        }
        const container = document.querySelector('.flex-wrap');
        if (!container) {
            console.error('No container found');
            return;
        }
        
        Object.entries(dataMap).forEach(([chartId, data]) => {
            const isAllNull = data.every(dataset => dataset.every(value => value === null));

            if (!isAllNull) {
                const datasets = createDatasets(data);
                console.log(datasets);
                const title = chartId.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

                const { min, max } = getMinMax(data);
               
                const canvas = createCanvas(chartId);
                container.appendChild(canvas);

                createLineChart(chartId, datasets, title, min, max);
            } else {
                console.log(`No valid data for ${chartId}`);
            }
        });
    })
    </script>
