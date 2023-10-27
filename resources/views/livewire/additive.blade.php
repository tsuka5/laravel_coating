
<div class="pt-2">
    <div class="container px-5 mx-auto">
        <div class="flex flex-col text-center w-full mb-4 mt-12">
          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Additive</h4>
        </div>
    <div class="col-5">

        <button type="button" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg" wire:click.prevent="add()">Add Additive</button>
        @foreach($additives as $key => $additive)
            <div class="card card-body">

                <div class="text-right">
                    <button type="button" class="bg-red-200 border-0 py-2 px-8 focus:outline-none hover:bg-red-400 rounded text-lg" wire:click.prevent="delete({{$key}})">削除</button>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="additives.{{ $key }}.name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" name="materials.{{ $key }}.name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="additives.{{ $key }}.name" wire:model.defer="additives.{{ $key }}.name">

                        @error("additives.$key.name")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("additives.$key.name") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="additives.{{ $key }}.price" class="leading-7 text-sm text-gray-600">Price</label>
                        <input type="number" name="additives.{{ $key }}.price" value="{{ old('price') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="additives.{{ $key }}.price" wire:model.defer="additives.{{ $key }}.price">

                        @error("additives.$key.price")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("additives.$key.price") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="additives.{{ $key }}.concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                        <input type="number" name="additives.{{ $key }}.concentration" value="{{ old('concentration') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="additives.{{ $key }}.concentration" wire:model.defer="additives.{{ $key }}.concentration">

                        @error("additives.$key.concentration")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("additives.$key.concentration") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
        @endforeach
        {{-- <button type="button" class="btn btn-success col-2" wire:click.prevent="create">登録</button> --}}
    </div>
</div>