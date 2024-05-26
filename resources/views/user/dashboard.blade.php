<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-xl">This is Web Database for Edible Coating!</p><br>
                    <p class="text-xl">This database was released on Dec.22, 2023.</p><br>
                    <p class="text-xl">This database was created by Manaka Takahashi and Tsukasa Ozaki at Poostharvest Science lab., faculty of Agriculture, Kyushu University.</p><br>
                    @if(!empty($pdfFile))
                    <p class="text-xl">If you have any questions about how to use this web database, <br>
                        please click on the link below, which describes how to use the web database</p><br>
                    <a href="{{ asset('storage/' . $pdfFile->pdf_file_path) }}" target="_blank" class="text-black hover:text-blue-500">→ PDF_file (How to use Web database)</a><br><br>
                    @endif
                    <p class="text-xl">If you find any errors, please let us know using <a href="{{ route('user.contact.index')}}" class="text-black hover:text-blue-500">the contact page</a></p>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <p class="text-lg rounded-full bg-red-200 p-2 px-4"> Recently registered data </p>
    </div>

    @if(!empty($experiments))
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                    
                        <div class="container px-5 mx-auto ">
                            <x-flash-message status="session('status')" />
                        <div class="w-full mx-auto overflow-auto border-2 border-gray-400 bg-white rounded-lg">
                            <table class="table-auto w-full text-left whitespace-no-wrap ">
                                <thead>
                                    <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-indigo-400 border w-1/3 text-center">Experiment_Title</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-indigo-400 border w-1/5 text-center">Material</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-indigo-400 border w-1/5 text-center">Fruit or Vesitable</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-lg bg-indigo-400 border w-1/6 text-center">Bacteria</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium bg-indigo-400"></th>
                                    </tr>
                                </thead>
                                
                                <tbody class="divide-y divide-gray-400">
                                    @foreach ($experiments as $experiment)
                                        {{-- @foreach ($compositions[$experiment->id] as $composition) --}}
                                            <tr>
                                                <td class="px-4 py-3 border w-1/5 text-center">
                                                        <p  style="word-wrap: break-word; max-width: 100%;">
                                                            {{$experiment->title}}
                                                        </p>
                                                </td>
                                                <td class="px-4 py-3 border w-1/3 text-center">
                                                    @foreach ($compositions[$experiment->id] as $composition)
                                                        @foreach($materials[$composition->id] as $material)
                                                            <p  style="word-wrap: break-word; max-width: 100%;">
                                                                {{$material->material_detail->name}} 
                                                            </p>
                                                        @endforeach
                                                    @break
                                                    @endforeach
                                                </td>
                                                <td class="px-4 py-3 border w-1/6 text-center">
                                                    @foreach ($compositions[$experiment->id] as $composition)
                                                        @foreach($fruits[$composition->id] as $fruit)
                                                        <p  style="word-wrap: break-word; max-width: 100%;">
                                                            {{$fruit->fruit_detail->name}} <br> 
                                                        </p>
                                                        @break
                                                        @endforeach
                                                    @break
                                                    @endforeach
                                                </td>
                                                <td class="px-4 py-3 border w-1/6 text-center">
                                                    @foreach ($compositions[$experiment->id] as $composition)
                                                        @foreach($bacteria[$composition->id] as $bacterium)
                                                        <p  style="word-wrap: break-word; max-width: 100%;">
                                                            {{$bacterium->bacteria_detail->name}} <br> 
                                                        </p>
                                                        @endforeach
                                                    @break
                                                    @endforeach
                                                </td>
                                                            
                                                <td class="px-4 py-3 border">
                                                    <div class="flex justify-center">
                                                        <button onclick="location.href='{{ route('user.experiment_show', ['composition_id' => $composition->id])}}'" class="text-white
                                                            bg-gray-400 border-0 py-2 px-4 focus:outline-none hover:bg-gray-500 rounded">Detail</button>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        
                                    @endforeach   
                                </tbody>
                            </table>
                            
                    </div>
                    </div>
                    {{ $experiments->links()}}    

                    </section>
                </div>
            </div>
        </div>
    </div> 
    @endif


</x-app-layout>
