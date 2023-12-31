<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Wwrite Note of Experiment
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  <section class="text-gray-600 body-font relative">


                      <div class="container px-5 mx-auto">
                        <div class="flex flex-col text-center w-full mb-4 mt-4">
                          <h4 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Note</h4>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          <x-input-error :messages="$errors->all()" class="mb-4"  />
                          <form method="post" action="{{ route('user.store', ['formType'=>'note', 'id' => $id]) }}">
                            @csrf

                            <div class="m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="note" class="leading-7 text-sm text-gray-600">Note</label>
                                  <textarea id="note" name="note" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-6 transition-colors duration-200 ease-in-out" maxlength="1000" rows="7" cols="20">{{ old('note') }}</textarea>
                                </div>
                              </div>
                            </div>

                            <div class="flex flex-wrap">
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                      <label for="img1" class="leading-7 text-sm text-gray-600">image1</label>
                                      <input type="file" id="img1" name="img1" value="{{ old('img1') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                              
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                      <label for="img2" class="leading-7 text-sm text-gray-600">image2</label>
                                      <input type="file" id="img2" name="img2" value="{{ old('img2') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                         
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                    <label for="img3" class="leading-7 text-sm text-gray-600">image3</label>
                                    <input type="file" id="img3" name="img3" value="{{ old('img3') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                          
                              <div class="p-2 w-1/2 mx-auto">
                                  <div class="relative mb-4">
                                    <label for="img4" class="leading-7 text-sm text-gray-600">image4</label>
                                    <input type="file" id="img4" name="img4" value="{{ old('img4') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                              </div>
                          
                            </div>


                            <div class="p-2 w-full flex justify-around mt-4">
                              <button type="button" onclick="location.href='{{ route('user.profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
                              <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                            </div>
                          </form>
                        </div>
                      </div>

                      
                    </section>
              </div>
          </div>
      </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dynamicFieldsContainer = document.getElementById('dynamicFields');
        const addDynamicGroupButton = document.getElementById('addDynamicGroup');
        const submitButton = document.getElementById('submitForm');
        
        addDynamicGroupButton.addEventListener('click', function() {
            // フォームグループのコンテナを作成
            const groupContainer = document.createElement('div');
            
            // フォームフィールドを3つ追加
            for (let i = 1; i <= 3; i++) {
                const newField = document.createElement('input');
                newField.type = 'text';
                newField.name = 'dynamic_field[]';
                newField.placeholder = '動的なフィールド ' + i;
                groupContainer.appendChild(newField);
            }
            
            dynamicFieldsContainer.appendChild(groupContainer);
        });

        // Submitボタンをクリックしたときの処理
        submitButton.addEventListener('click', function() {
            // フォームをサブミット
            document.querySelector('form').submit();
        });
    });
</script>
</x-app-layout>
