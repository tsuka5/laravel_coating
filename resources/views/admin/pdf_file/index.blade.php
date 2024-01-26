<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Register PDF file
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
  
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                          <x-flash-message status="session('status')" />
                          <div class="flex flex-col text-center w-full mb-4 mt-4">
                            <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">PDF file</h4>
                          </div>
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <x-input-error :messages="$errors->all()" class="mb-4"  />
                            <form method="post" action="{{ route('admin.pdf_file.store')}}" enctype="multipart/form-data">
                              @csrf
  
                              <div class="m-2">
                                <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">PDF Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 
                                    bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2
                                     focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mx-auto">
                                    <div class="relative mb-4">
                                      <label for="pdf_file_path" class="leading-7 text-sm text-gray-600">PDF file</label>
                                      <input type="file" id="pdf_file_path" name="pdf_file_path" class="w-full bg-gray-100 
                                      bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2
                                       focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors 
                                       duration-200 ease-in-out">
                                    </div>
                                </div>
                              </div>

                              <div class="p-2 w-full flex justify-around mt-4">
                                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none
                                 hover:bg-indigo-600 rounded text-lg">Register</button>
                              </div>
                            </form>
                          </div>
                          @if($uploadedFiles->isEmpty())
                          @else
                            <div class="flex flex-col text-center w-full mb-4 mt-4">
                              <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-8">
                                Uploded File
                              </h2>
                            </div>
                            <div class="w-1/2 mx-auto">
                              <table class="table-auto w-full">
                                <thead>
                                  <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium 
                                    text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Date</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium 
                                    text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Name</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium 
                                    text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($uploadedFiles as $uploadedFile)
                                      <tr>
                                          <td class="px-4 py-3">{{ $uploadedFile->created_at }}</td>
                                          <td class="px-4 py-3">{{ $uploadedFile->name }}</td>
                                          <form id="delete_{{ $uploadedFile->id }}" method="post" 
                                            action="{{ route('admin.pdf.destroy', ['pdf' => $uploadedFile->id ])}}">
                                            @csrf
                                            <td class="px-4 py-3">
                                                <a href="#" data-id="{{ $uploadedFile->id }}" 
                                                  onclick="deletePost(this)" class="text-white bg-red-400 border-0
                                                   py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Delete</a>
                                            </td>
                                        </form>
                                      </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              {{ $uploadedFiles->links() }}
                            </div>
                          @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
      function deletePost(e){
          'use strict'
          if(confirm('Are you sure you want to delete this data?')){
              document.getElementById('delete_' + e.dataset.id).submit()
          }
      }
  </script>
  
  </x-app-layout>
  ]
  