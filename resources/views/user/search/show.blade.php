


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Experiment Data
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-4 mt-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Experiment</h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->title }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->name }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative"> 
                                                <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->date }}</div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="paper" class="leading-7 text-sm text-gray-600">Paper</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->paper }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
    
                                
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Materials</h4>
                                </div>
    
                                
                                @foreach ($materials as $material)
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="m_name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->m_name }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->price }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                                                <div type="number" name="concentration[{{ $material->id }}]" value="" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->concentration }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="heat" class="leading-7 text-sm text-gray-600">Heat</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->heat }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="water_temperature" class="leading-7 text-sm text-gray-600">Water Temperature</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->water_temperature }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="material_rate" class="leading-7 text-sm text-gray-600">Material Rate</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->material_rate }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="staler_speed" class="leading-7 text-sm text-gray-600">Staler Speed</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->staler_speed }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="repeat" class="leading-7 text-sm text-gray-600">Rpeat</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->repeat }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="staler_time" class="leading-7 text-sm text-gray-600">Staler Time</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->staler_time }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">pH Adjustment</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->ph_adjustment }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="ph_material" class="leading-7 text-sm text-gray-600">pH Material </label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->ph_material }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="ph_target" class="leading-7 text-sm text-gray-600">pH target</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $material->ph_target }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
    
    
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Additive</h4>
                                </div>
    
                                @foreach($additives as $additive)
                                <div class="container border-b-4">
                                    <div class="flex justify-center flex-wrap flex-row">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="ad_name" class="leading-7 text-sm text-gray-600">Name</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $additive->ad_name }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $additive->price }}</div>
                                            </div>
                                        </div>
                        
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    >{{ $additive->concentration }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                @endforeach
                                
    
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Film Conditions</h4>
                                </div>
                                
                                @foreach ($film_conditions as $film_condition)
    
                                <div class="m-2">
                                    <div class="container">
                                        <div class="flex justify-center flex-wrap flex-row">
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="degassing_temperature" class="leading-7 text-sm text-gray-600">Degassing Temperature<br>(脱気温度) ℃</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->degassing_temperature }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="dish_type" class="leading-7 text-sm text-gray-600">Dish Type(ペトリ皿のタイプ)</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->dish_type }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative"> 
                                                    <label for="dish_area" class="leading-7 text-sm text-gray-600">Dish Area<br>(ペトリ皿の表面積) cm^2</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->dish_area }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="casting_ml" class="leading-7 text-sm text-gray-600">Casting(キャスティング量) ml</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->casting_ml }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="incubator_type" class="leading-7 text-sm text-gray-600">Incubator Type<br>(インキュベータの種類)</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->incubator_type }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="drying_temperature" class="leading-7 text-sm text-gray-600">Drying Temperature<br>(乾燥温度) ℃</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->drying_temperature }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="drying_humidity" class="leading-7 text-sm text-gray-600">Drying_humidity<br>(乾燥温度) %RH</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->drying_humidity }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="drying_time" class="leading-7 text-sm text-gray-600">Drying Time(乾燥時間) h</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $film_condition->drying_time }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                @endforeach
                            
                            
    
    
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Charactaristic Test</h4>
                                </div>
                                <div class="m-2">
                                    <div class="container">
                                        <div class="flex justify-center flex-wrap flex-row">
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="ph" class="leading-7 text-sm text-gray-600">ph </label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->ph }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="shear_rate" class="leading-7 text-sm text-gray-600">Shear Rate(せん断速度)</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->shear_rate }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative"> 
                                                    <label for="shear_stress" class="leading-7 text-sm text-gray-600">Shear Stress(せん断応力) </label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->shear_stress }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="viscosity" class="leading-7 text-sm text-gray-600">Viscosity(粘度)</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->viscosity }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content(含水量)</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->moisture_content }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="water_solubility" class="leading-7 text-sm text-gray-600">Water Solubility(溶解度)</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->water_solubility }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="wvp" class="leading-7 text-sm text-gray-600">WVP(水蒸気透過性)</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->wvp }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="thickness" class="leading-7 text-sm text-gray-600">Thickness(厚さ) mm</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->thickness }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                <label for="contact_angle" class="leading-7 text-sm text-gray-600">Contact Angle(接触角) ℃</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->contact_angle }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                <label for="tensile_strength" class="leading-7 text-sm text-gray-600">Tensile Strength(引張強度)</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->charactaristic_test->tensile_strength }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Storing Test</h4>
                                </div>
                                <div class="m-2">
                                    <div class="container">
                                        <div class="flex justify-center flex-wrap flex-row">
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="s_name" class="leading-7 text-sm text-gray-600">Fruits or Vegitable </label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->s_name }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="storing_days" class="leading-7 text-sm text-gray-600">Storing days</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->storing_days }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative"> 
                                                    <label for="mass_loss_rate" class="leading-7 text-sm text-gray-600">Mass Loss Rate </label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->mass_loss_rate }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="color_l" class="leading-7 text-sm text-gray-600">*L</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->color_l }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="color_a" class="leading-7 text-sm text-gray-600">*b</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->color_a }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                <label for="color_b" class="leading-7 text-sm text-gray-600">*b</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->color_b }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="color_e" class="leading-7 text-sm text-gray-600">⊿*E</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->color_e }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="ph" class="leading-7 text-sm text-gray-600">pH</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->ph }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                <label for="tss" class="leading-7 text-sm text-gray-600">TSS</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->tss }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                <label for="hardness" class="leading-7 text-sm text-gray-600">Hardness</label>
                                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->storing_test->hardness }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="flex flex-col text-center w-full mb-4 mt-12">
                                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Antibacteria Test</h4>
                                </div>
                                <div class="m-2">
                                    <div class="container">
                                        <div class="flex justify-center flex-wrap flex-row">
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="a_name" class="leading-7 text-sm text-gray-600">Bacteria Name </label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->antibacteria_test->a_name }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="bacteria_rate" class="leading-7 text-sm text-gray-600">Bacteria Rate</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->antibacteria_test->bacteria_rate }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative"> 
                                                    <label for="a_moisture_content" class="leading-7 text-sm text-gray-600">Moisture Content </label>
                                                    <input type="number" id="a_moisture_content" name="a_moisture_content" value="{{ $experiment->antibacteria_test->a_moisture_content }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                    <div class="relative">
                                                    <label for="afm" class="leading-7 text-sm text-gray-600">AFM</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->antibacteria_test->afm }}</div>
                                                    </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                    <div class="relative">
                                                    <label for="sem" class="leading-7 text-sm text-gray-600">SEM</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->antibacteria_test->sem }}</div>
                                                    </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="dsc" class="leading-7 text-sm text-gray-600">DSC</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->antibacteria_test->dsc }}</div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-1/2 mx-auto">
                                                    <div class="relative">
                                                    <label for="ftir" class="leading-7 text-sm text-gray-600">FTIR</label>
                                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $experiment->antibacteria_test->ftir }}</div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="p-2 w-full flex justify-around mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.search.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
                              






                            