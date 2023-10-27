
<div class="pt-2">
    <div class="container px-5 mx-auto">
        <div class="flex flex-col text-center w-full mb-4 mt-12">
          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Material</h4>
        </div>
    <div class="col-5">
        {{-- <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button> --}}

        <button type="button" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg" wire:click.prevent="add()">Add Material</button>
        @foreach($materials as $key => $material)
            <div class="card card-body">

                <div class="text-right">
                    <button type="button" class="bg-red-200 border-0 py-2 px-8 focus:outline-none hover:bg-red-400 rounded text-lg" wire:click.prevent="delete({{$key}})">削除</button>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" name="materials.{{ $key }}.name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.name" wire:model.defer="materials.{{ $key }}.name">

                        @error("materials.$key.name")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.name") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.price" class="leading-7 text-sm text-gray-600">Price</label>
                        <input type="number" name="materials.{{ $key }}.price" value="{{ old('price') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.price" wire:model.defer="materials.{{ $key }}.price">

                        @error("materials.$key.price")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.price") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                        <input type="number" name="materials.{{ $key }}.concentration" value="{{ old('concentration') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.concentration" wire:model.defer="materials.{{ $key }}.concentration">

                        @error("materials.$key.concentration")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.concentration") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.heat" class="leading-7 text-sm text-gray-600">Heat</label>
                        <input type="number" name="materials.{{ $key }}.heat" value="{{ old('heat') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.heat" wire:model.defer="materials.{{ $key }}.heat">

                        @error("materials.$key.heat")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.heat") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.water_temperature" class="leading-7 text-sm text-gray-600">Water Temperature</label>
                        <input type="number" name="materials.{{ $key }}.water_temperature" value="{{ old('water_temperature') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.water_temperature" wire:model.defer="materials.{{ $key }}.water_temperature">

                        @error("materials.$key.water_temperature")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.water_temperature") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.material_rate" class="leading-7 text-sm text-gray-600">Material Rate</label>
                        <input type="number" name="materials.{{ $key }}.material_rate" value="{{ old('material_rate') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.material_rate" wire:model.defer="materials.{{ $key }}.material_rate">

                        @error("materials.$key.material_rate")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.material_rate") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.starler_speed" class="leading-7 text-sm text-gray-600">Starler Speed</label>
                        <input type="number" name="materials.{{ $key }}.starler_speed" value="{{ old('starler_speed') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.starler_speed" wire:model.defer="materials.{{ $key }}.starler_speed">

                        @error("materials.$key.starler_speed")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.starler_speed") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.repeat" class="leading-7 text-sm text-gray-600">Rpeat</label>
                        <input type="number" name="materials.{{ $key }}.repeat" value="{{ old('repeat') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.repeat" wire:model.defer="materials.{{ $key }}.repeat">

                        @error("materials.$key.repeat")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.repeat") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.staler_time" class="leading-7 text-sm text-gray-600">Staler Time</label>
                        <input type="number" name="materials.{{ $key }}.staler_time" value="{{ old('staler_time') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.staler_time" wire:model.defer="materials.{{ $key }}.staler_time">

                        @error("materials.$key.staler_time")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.staler_time") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.ph_adjustment" class="leading-7 text-sm text-gray-600">pH Adjustment</label>
                        <input type="number" name="materials.{{ $key }}.ph_adjustment" value="{{ old('ph_adjustment') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.ph_adjustment" wire:model.defer="materials.{{ $key }}.ph_adjustment">

                        @error("materials.$key.ph_adjustment")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.ph_adjustment") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.ph_material" class="leading-7 text-sm text-gray-600">pH Material </label>
                        <input type="number" name="materials.{{ $key }}.ph_material" value="{{ old('ph_material') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.ph_material" wire:model.defer="materials.{{ $key }}.ph_material">

                        @error("materials.$key.ph_material")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.ph_material") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="materials.{{ $key }}.ph_target" class="leading-7 text-sm text-gray-600">pH target</label>
                        <input type="number" name="materials.{{ $key }}.ph_target" value="{{ old('ph_target') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="materials.{{ $key }}.ph_target" wire:model.defer="materials.{{ $key }}.ph_target">

                        @error("materials.$key.ph_target")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("materials.$key.ph_target") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
        @endforeach
        {{-- <button type="button" class="btn btn-success col-2" wire:click.prevent="create">登録</button> --}}
    </div>
</div>