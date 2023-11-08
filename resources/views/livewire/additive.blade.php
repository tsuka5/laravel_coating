
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
                    <button type="button" class="bg-red-200 border-0 py-2 px-8 focus:outline-none hover:bg-red-400 rounded text-lg" wire:click.prevent="delete({{$key}})">Delete</button>
                </div>

                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="ad_name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" name="ad_name" value="{{ old('ad_name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="ad_name" wire:model.defer="ad_name">

                        @error("ad_name")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("ad_name") }}</strong>
                        </span>
                        @enderror
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
                        <label for="concentration" class="leading-7 text-sm text-gray-600">Concentration</label>
                        <input type="number" name="concentration" value="{{ old('concentration') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            id="concentration" wire:model.defer="concentration">

                        @error("concentration")
                        <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first("concentration") }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
        @endforeach
        </form>
        <div class="p-2 w-full flex justify-around mt-4">
            <button type="button" onclick="location.href='{{ route('user.profile.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
        </div>
    </div>
</div>