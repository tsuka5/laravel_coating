


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Characteristic Test Chart
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
                            

                            <div class = "flex justify-center flex-wrap">
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
    document.addEventListener("DOMContentLoaded", function () {
        const colors = [
            'rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)',
            'rgba(199, 199, 199, 0.8)', 'rgba(83, 102, 255, 0.8)', 'rgba(255, 99, 204, 0.8)',
            'rgba(210, 99, 132, 0.8)'
        ];
    
        const borderColors = colors.map(color => color.replace('0.8', '1'));
    
       
        const composition_count_list = @json($composition_count_list);
        const x_label = @json($x_label);
        const temperature = @json($temperature);
        const humidity = @json($humidities);

        const dataMap = {
            ph: @json($ph),
            viscosity: @json($viscosities),
            water_solubility: @json($water_solubility),
            wvp: @json($wvps),
            contact_angle: @json($contact_angle),
            shear_stress: @json($shear_stresses),
            ts: @json($ts),
            eab: @json($eab),
            light_transmittance: @json($light_transmittance),
            thickness: @json($thickness),
            moisture_content: @json($moisture_content),
            d43: @json($d43),
            d32: @json($d32)
        };
    
        const container = document.querySelector('.flex-wrap');
        if (!container) {
            console.error('No container found for canvas elements');
            return;
        }

        function createCanvas(chartId) {
            const canvas = document.createElement('canvas');
            canvas.id = chartId;
            canvas.width = 400;
            canvas.height = 400;
            canvas.classList.add('m-10');
            return canvas;
        }

        // データセットを作成
        function createDatasets(data, labelPrefix) {
            const isBarChart = !['wvp', 'viscosity'].includes(labelPrefix);

            if (isBarChart) {
                // 棒グラフの場合、1つのデータセットを作成
                const datasetData = composition_count_list.map((_, index) => {
                    const value = data[index];
                    return value === null || value === undefined ? 0 : value;
                });

                return [
                    {
                        label: labelPrefix.replace('_', ' ').toUpperCase(),
                        data: datasetData,
                        backgroundColor: colors.slice(0, datasetData.length), // データ数に合わせる
                        borderColor: borderColors.slice(0, datasetData.length),
                        borderWidth: 1
                    }
                ];
            } else {
                // 折れ線グラフの場合、compositionごとにデータセットを作成
                return composition_count_list.map((composition, index) => {
                    const datasetData = Array.isArray(data[index])
                        ? data[index].map(value => (value === null || value === undefined ? 0 : value))
                        : [data[index] === null || data[index] === undefined ? 0 : data[index]];

                    return {
                        label: `composition: ${composition}`,
                        data: datasetData,
                        backgroundColor: colors[index % colors.length],
                        borderColor: borderColors[index % borderColors.length],
                        borderWidth: 1
                    };
                });
            }
        }


    
        // グラフ作成の共通関数
        function createChart(chartId, type, datasets, title, labels) {
            const ctx = document.getElementById(chartId).getContext('2d');
            const maxValue = Math.max(...datasets.flatMap(dataset => dataset.data)) * 1.1;
    
            return new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: datasets
                },
               
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: maxValue,
                            grid: { display: false }
                        },
                        x: {
                            grid: { display: false }
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
        console.log(dataMap);
        Object.entries(dataMap).forEach(([key, data]) => {
            const isAllNull = Array.isArray(data[0]) // data がネストされた配列かどうか確認
                ? data.every(dataset => dataset.every(value => value === null))
                : data.every(value => value === null);

            if (!isAllNull) {
                const datasets = createDatasets(data, key);
                const canvas = createCanvas(key);
                container.appendChild(canvas);
                const chartType = ['viscosity', 'wvp'].includes(key) ? 'line' : 'bar';
                const label = key === 'viscosity' ? temperature : key === 'wvp' ? humidity : x_label;
                createChart(key, chartType, datasets, key.replace('_', ' ').toUpperCase(), label);
                
            } else {
                console.log(`No valid data for ${key}`);
            }
        });

    });
    </script>
    

