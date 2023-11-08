
    <div class="pt-2">
    <div class="container px-5 mx-auto">
        <div class="flex flex-col text-center w-full mb-4 mt-12">
            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Material</h4>
        </div>
    <div class="col-5">
        

        <button type="button" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg" wire:click="addMaterial()">Add Material</button>
        @foreach($materials as $key => $material)
            <div class="card card-body">

                <div class="text-right">
                    <button type="button" class="bg-red-200 border-0 py-2 px-8 focus:outline-none hover:bg-red-400 rounded text-lg" wire:click.prevent="delete({{$key}})">Delete</button>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label  class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" wire:model="materials.{{ $key }}.m_name" name="materials[{{ $key }}[m_name]]" id="material_{{ $key }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" >

                        {{-- @error("m_name.{{$key}}")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("m_name") }}</strong>
                        </span>
                        @enderror --}}
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="price" class="leading-7 text-sm text-gray-600">Price</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="price" wire:model.defer="price">

                        @error("price")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("price") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                        <input type="number" name="concentration" value="{{ old('concentration') }}" step=0.01 class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="concentration" wire:model.defer="concentration">

                        @error("concentration")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("concentration") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="heat" class="leading-7 text-sm text-gray-600">Heat</label>
                        <input type="number" name="heat" value="{{ old('heat') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="heat" wire:model.defer="heat">

                        @error("heat")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("heat") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="water_temperature" class="leading-7 text-sm text-gray-600">Water Temperature</label>
                        <input type="number" name="water_temperature" value="{{ old('water_temperature') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="water_temperature" wire:model.defer="water_temperature">

                        @error("water_temperature")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("water_temperature") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="material_rate" class="leading-7 text-sm text-gray-600">Material Rate</label>
                        <input type="number" name="material_rate" value="{{ old('material_rate') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="material_rate" wire:model.defer="material_rate">

                        @error("material_rate")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("material_rate") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="starler_speed" class="leading-7 text-sm text-gray-600">Starler Speed</label>
                        <input type="number" name="starler_speed" value="{{ old('starler_speed') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="starler_speed" wire:model.defer="starler_speed">

                        @error("starler_speed")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("starler_speed") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="repeat" class="leading-7 text-sm text-gray-600">Rpeat</label>
                        <input type="number" name="repeat" value="{{ old('repeat') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="repeat" wire:model.defer="repeat">

                        @error("repeat")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("repeat") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="staler_time" class="leading-7 text-sm text-gray-600">Staler Time</label>
                        <input type="number" name="staler_time" value="{{ old('staler_time') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="staler_time" wire:model.defer="staler_time">

                        @error("staler_time")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("staler_time") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="ph_adjustment" class="leading-7 text-sm text-gray-600">pH Adjustment</label>
                        <input type="number" name="ph_adjustment" value="{{ old('ph_adjustment') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="ph_adjustment" wire:model.defer="ph_adjustment">

                        @error("ph_adjustment")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("ph_adjustment") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="ph_material" class="leading-7 text-sm text-gray-600">pH Material </label>
                        <input type="number" name="ph_material" value="{{ old('ph_material') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="ph_material" wire:model.defer="ph_material">

                        @error("ph_material")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("ph_material") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="ph_target" class="leading-7 text-sm text-gray-600">pH target</label>
                        <input type="number" name="ph_target" value="{{ old('ph_target') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="ph_target" wire:model.defer="ph_target">

                        @error("ph_target")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("ph_target") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
        @endforeach
        

    
    </div>
</div>

@livewire('additive')
                                






