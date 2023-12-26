<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Enter Reply
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
                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">User's Requests</h4>
                  </div>
                  <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <x-input-error :messages="$errors->all()" class="mb-4"  />
                    {{-- <form method="post" action="{{ route('user.contact.store') }}">
                      @csrf

                      <div class="m-2">
                        <div class="p-2 mx-auto">
                          <div class="relative">
                            <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                            <input type="title" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-6 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="m-2">
                          <div class="p-2 mx-auto">
                              <div class="relative">
                                  <label for="content" class="leading-7 text-sm text-gray-600">Content</label>
                                  <textarea id="content" name="content" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-6 transition-colors duration-200 ease-in-out" maxlength="1000" rows="7" cols="20">{{ old('content') }}</textarea>
                              </div>
                          </div>
                        </div>
                        
                      <div class="p-2 w-full flex justify-around mt-4">
                        <button type="button" onclick="location.href='{{ route('user.contact.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                        <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
                      </div>
                    </form> --}}

                  </div>
                  @if($contacts->isEmpty())
                    {{-- <p>No past requests found.</p> --}}
                  @else
                    {{-- <div class="flex flex-col text-center w-full mb-4 mt-4">
                      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-8">
                        Users Requests
                      </h2>
                    </div> --}}
                    <div class="w-full mx-auto">
                      <table class="table-auto w-full">
                        <thead>
                          <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Date</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Title</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Content</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"></th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($contacts as $contact)
                              <tr class="text-center">
                                  <td class="px-4 py-3">{{ $contact->created_at }}</td>
                                  <td class="px-4 py-3">{{ $contact->title }}</td>
                                  <td class="px-4 py-3">{{ $contact->content }}</td>
                                  <td class="px-4 py-3">                     
                                    <button onclick="location.href='{{ route('admin.contact.create', ['user_id' => $contact->id])}}'" class="mb-2 h-9 text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Reply</button>
                                  </td>
                      
                                  <td class="px-4 py-3">
                                    @if( $contact->reply )
                                    <a href="{{ route('admin.contact.show', ['id' => $contact->id]) }}" class="font-medium text-indigo-500 text-sm">Replied</a>
                                    @else
                                    <div class="font-midium text-red-500 text-sm"> Unreplied</div>
                                    @endif
                                  </td>
                              </tr>
                          @endforeach
                  
                        </tbody>
                      </table>
                      {{ $contacts->links() }}
                    </div>
                  @endif
                </div>
              </section>
            </div>
          </div>
      </div>
  </div>
  
</x-app-layout>
