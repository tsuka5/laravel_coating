<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Reply
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

              <section class="text-gray-600 body-font relative">


                <div class="container px-5 mx-auto">
                  <div class="flex flex-col text-center w-full mb-4 mt-4">
                    <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Reply</h4>
                  </div>
                  <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <x-input-error :messages="$errors->all()" class="mb-4"  />
                    <form method="post" action="{{ route('admin.contact.store')}}">
                      @csrf
                      <input type="hidden" name="user_id" value="{{ $user_id }}">
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
                        <button type="button" onclick="location.href='{{ route('admin.contact.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                        <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
                      </div>
                    </form>
                  </div>
                </div>   
              </section>
            </div>
          </div>
      </div>
  </div>

  {{-- <script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
      event.preventDefault(); // デフォルトのフォーム送信を防止
  
      // フォームデータを取得
      let formData = new FormData(this);
  
      // フォームの送信先URL
      let url = this.getAttribute('action');
  
      // フォームを送信する（admin.contact.store）
      fetch(url, {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          // admin.contact.storeが成功したら、admin.contact.updateを実行
          return fetch('{{ route('admin.contact.update')}}', {
            method: 'POST',
            // 必要なデータを追加でここに設定
          });
        } else {
          throw new Error('Network response was not ok.');
        }
      })
      .then(updateResponse => {
        // admin.contact.updateのレスポンスを処理する
        // 必要に応じて何かしらのアクションを実行
      })
      .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
      });
    });
  </script> --}}
  
</x-app-layout>
