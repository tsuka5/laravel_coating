


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


                            <div class = "flex justify-center flex-wrap">
                                @if($item === 'ph')
                                {{-- pHのグラフ --}}
                                
                                <canvas id="ph" width="800" height="400" class="m-10"></canvas>
                                @endif
                                
                            </div>

                            <div class="p-2 w-full flex justify-around mt-4">
                              <button onclick="location.href='{{ route('user.search.index') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded my-2">Back</button>
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
const ph = @json($ph);
console.log(ph);

const sortedData = Object.entries(ph)
    .map(([key, value]) => ({x: parseInt(key), y: parseFloat(value), composition_id: key }))
    .sort((a, b) => a.y - b.y);
console.log(sortedData);

const data = sortedData.map((item, index) => ({
    x: index + 1,
    y: item.y,
    composition_id: item.composition_id
}));
   

const ctx = document.getElementById('ph').getContext('2d');
const barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data.map(item => item.composition_id),
        datasets: [{
            label: 'pH',
            backgroundColor: 'rgb(255, 99, 132)',
            data: data
        }]
    },
    options: {
        responsive:false,
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Composition ID'
                },
                // min: 0,
                // max: sortedData.length + 1,
                ticks: {
                    display: true,
                    stepSize: 1,
                },
                type: 'category',
                position: 'bottom',
                grid: {
                    display: false
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'PH Value'
                },
                min: 0,
                max: 14,
                ticks: {
                    stepSize: 1,
                    suggestedMin: 0,
                    suggestedMax: 14,
                },
                afterBuildTicks: function(axis, ticks) {
                    // カスタムビルドでy=7の位置にx軸を配置
                    if (!ticks || !ticks.length) {
                    return [];
                }
                    var newTicks = ticks.map(tick => {
                        const adjustedValue = tick.value - 7;
                        return {
                            value: adjustedValue,
                            label: adjustedValue + 7
                        };
                    });
                    axis.ticks = newTicks;
                    return newTicks;
                },
                grid: {
                    display: false
                }
            }
        },
        plugins: {
                title: {
                    display: true,
                    text: 'pH',
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
const experimentRoute = @json(route('user.experiment_show', ['experiment_id' => 'PLACEHOLDER']));
ctx.canvas.onclick = function (event) {
    const points = barChart.getElementsAtEventForMode(event, 'nearest', {intersect: true}, true);
    if(points.length) {
        const firstPoint = points[0];
        const compositionId = barChart.data.datasets[firstPoint.datasetIndex].data[firstPoint.index].composition_id;
        const url = experimentRoute.replace('PLACEHOLDER', compositionId)
        window.location.href=url;
    }
};
// const ctx = document.getElementById('ph').getContext('2d');
// const scatterChart = new Chart(ctx, {
//     type: 'scatter',
//     data: {
//         datasets: [{
//             label: 'pH',
//             ifbackgroundColor: 'rgb(255, 99, 132)',
//             data: data
//         }]
//     },
//     options: {
//         responsive:false,
//         maintainAspectRatio: false,
//         scales: {
//             x: {
//                 title: {
//                     display: true,
//                     text: 'Composition ID'
//                 },
//                 min: 0,
//                 max: sortedData.length + 1,
//                 ticks: {
//                     display: false,
//                     stepSize: 1,
//                 },
//                 type: 'linear',
//                 position: 'bottom',
//                 grid: {
//                     display: false
//                 }
//             },
//             y: {
//                 title: {
//                     display: true,
//                     text: 'PH Value'
//                 },
//                 min: 0,
//                 max: 14,
//                 ticks: {
//                     stepSize: 1
//                 },
//                 grid: {
//                     display: false
//                 }
//             }
//         },
//         plugins: {
//                 title: {
//                     display: true,
//                     text: 'pH',
//                     font: {
//                         size: 16
//                     },
//                     padding: {
//                         top: 20,
//                         bottom: 30
//                     },
//                     color: '#111'
//                 }
//             }
//     }
// });
// const experimentRoute = @json(route('user.experiment_show', ['experiment_id' => 'PLACEHOLDER']));
// ctx.canvas.onclick = function (event) {
//     const points = scatterChart.getElementsAtEventForMode(event, 'nearest', {intersect: true}, true);
//     if(points.length) {
//         const firstPoint = points[0];
//         const compositionId = scatterChart.data.datasets[firstPoint.datasetIndex].data[firstPoint.index].composition_id;
//         const url = experimentRoute.replace('PLACEHOLDER', compositionId)
//         window.location.href=url;
//     }
// };


</script>








                            