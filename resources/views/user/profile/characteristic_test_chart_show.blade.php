


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
                                {{-- 粘度のグラフ --}}
                                <canvas id="viscosity" width="400" height="400" class="m-10"></canvas>
                                {{-- 水透過性のグラフ --}}
                                <canvas id="wvp" width="400" height="400" class="m-10"></canvas>
                                {{-- せん断応力のグラフ --}}
                                <canvas id="shear_stress" width="400" height="400" class="m-10"></canvas>
                                {{-- pHのグラフ --}}
                                <canvas id="ph" width="400" height="400" class="m-10"></canvas>
                                {{-- 溶解度のグラフ --}}
                                <canvas id="water_solubility" width="400" height="400" class="m-10"></canvas>
                                {{-- 接触角のグラフ --}}
                                <canvas id="contact_angle" width="400" height="400" class="m-10"></canvas>
                                
                                <canvas id="ts" width="400" height="400" class="m-10"></canvas>

                                <canvas id="eab" width="400" height="400" class="m-10"></canvas>

                                <canvas id="light_transmittance" width="400" height="400" class="m-10"></canvas>

                                <canvas id="thickness" width="400" height="400" class="m-10"></canvas>

                                <canvas id="moisture_content" width="400" height="400" class="m-10"></canvas>

                                <canvas id="d43" width="400" height="400" class="m-10"></canvas>

                                <canvas id="d32" width="400" height="400" class="m-10"></canvas>
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
const ph = @json($ph);
const viscosity = @json($viscosities);
console.log(viscosity);
const temperature = @json($temperature);
const humidity = @json($humidities);
const water_solubility = @json($water_solubility);
const wvp = @json($wvps);
const contact_angle = @json($contact_angle);
const shear_rate = @json($shear_rates);
const shear_stress = @json($shear_stresses);
const ts = @json($ts);
const eab = @json($eab);
const light_transmittance = @json($light_transmittance);
const thickness = @json($thickness);
const moisture_content = @json($moisture_content);
const d43 = @json($d43);
const d32 = @json($d32);

const viscosity_datasets = [];
const shear_stress_datasets = [];
const wvp_datasets = [];

composition_count_list.forEach((composition_count, index) => {
    viscosity_datasets.push({
        label: `composition: ${composition_count}`,
        data: viscosity[index],
        backgroundColor: colors[index % colors.length],
        borderColor: borderColors[index % borderColors.length],
        borderWidth: 1
    });
    shear_stress_datasets.push({
        label: `composition: ${composition_count}`,
        data: shear_stress[index],
        backgroundColor: colors[index % colors.length],
        borderColor: borderColors[index % borderColors.length],
        borderWidth: 1
    });
    wvp_datasets.push({
        label: `composition: ${composition_count}`,
        data: wvp[index],
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
console.log(temperature);
var viscosityChart = createLineChart('viscosity', viscosity_datasets, 'Viscosity(cP)', temperature);
var shear_stressChart = createLineChart('shear_stress', shear_stress_datasets, 'Shear Stress', shear_rate);
var wvpChart = createLineChart('wvp', wvp_datasets, 'Wvp', humidity);

function createDataset(label, data, colorIndex) {
    return {
        label: label,
        data: data,
        backgroundColor: colors[colorIndex % colors.length],
        borderColor: borderColors[colorIndex % borderColors.length],
        borderWidth: 1
    };
}
const ph_datasets = createDataset('pH', ph, 0);
// const viscosity_datasets = createDataset('viscosity', viscosity, 1);
const water_solubility_datasets = createDataset('water solubility', water_solubility, 2);
// const wvp_datasets = createDataset('wvp', wvp, 3);
const contact_angle_datasets = createDataset('contact_angle', contact_angle, 4);
// const shear_rate_datasets = createDataset('shear_rate', shear_rate, 5);
// const shear_stress_datasets = createDataset('shear_stress', shear_stress, 6);
const ts_datasets = createDataset('ts', ts, 7);
const eab_datasets = createDataset('eab', eab, 8);
const light_transmittance_datasets = createDataset('light_transmittance', light_transmittance, 9);
const thickness_datasets = createDataset('thickness', thickness, 10);
const moisture_content_datasets = createDataset('moisture_content', moisture_content, 11);
const d43_datasets = createDataset('d43', d43, 12);
const d32_datasets = createDataset('d32', d32, 13);



// グラフを作成する
function createBarChart(chartId, datasets, title, labels) {
    var ctx = document.getElementById(chartId).getContext('2d');
    //データの最大値を計算
    const maxValue = datasets.reduce((max, dataset) => {
        const datasetMax = Math.max(...dataset.data);
        return datasetMax > max ? datasetMax : max;
    }, 0);
    
    
    return new Chart(ctx, {
        type: 'bar', // グラフのタイプ
        data: {
            labels: labels, // x軸ラベル
            datasets: datasets  //データセット配列
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            
            scales: {
                y: {
                    beginAtZero: true,
                    max: maxValue * 1.1,
                    grid: {
                        display: false,
                    }
                },
                x: {
                    grid:{
                        display: false
                    }
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
console.log(ph_datasets);
var phChart = createBarChart('ph', [ph_datasets], 'pH', x_label);
// var viscosityChart = createBarChart('viscosity', [viscosity_datasets], 'Viscosity (cP)', x_label);
var waterSolubilityChart = createBarChart('water_solubility', [water_solubility_datasets], 'Water Solubility (%)', x_label);
// var wvpChart = createBarChart('wvp', [wvp_datasets], 'wvp', x_label);
var contactAngleChart = createBarChart('contact_angle', [contact_angle_datasets], 'Contact Angle (°)', x_label);
// var shearRateChart = createBarChart('shear_rate', [shear_rate_datasets], 'Shear Rate (1/s)', x_label);
// var shearStressChart = createBarChart('shear_stress', [shear_stress_datasets], 'Shear Stress (Pa*s)', x_label);
var tsChart = createBarChart('ts', [ts_datasets], 'Tensile Strength (MPa)', x_label);
var eabChart = createBarChart('eab', [eab_datasets], 'EAB (%)', x_label);
var lightTransmittanceChart = createBarChart('light_transmittance', [light_transmittance_datasets], 'Light Transmittance (%)', x_label);
var thicknessChart = createBarChart('thickness', [thickness_datasets], 'Thickness (mm)', x_label);
var moistureContentChart = createBarChart('moisture_content', [moisture_content_datasets], 'Moisture Content (%)', x_label);
var d43Chart = createBarChart('d43', [d43_datasets], 'D43 (mm)', x_label);
var d32Chart = createBarChart('d32', [d32_datasets], 'D32 (mm)', x_label);

</script>







                            