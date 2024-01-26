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
                  </div>
                  @if($contacts->isEmpty())
                  @else
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
                                    <button onclick="location.href='{{ route('admin.contact.create', ['user_id' => $contact->id])}}'" class="mb-2 h-9 text-white
                                       bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">Reply</button>
                                  </td>
                                  <td class="px-4 py-3">
                                    @if( $contact->reply )
                                    <a href="{{ route('admin.contact.show', ['id' => $contact->id]) }}" 
                                      class="font-medium text-indigo-500 text-sm">Replied</a>
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
