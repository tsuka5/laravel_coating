<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- <p class="text-xl">You're logged in!<br><br> --}}
                    <p class="text-xl">This is Web Database for Edible Coating!</p><br>

                    <p class="text-xl">You can do a lot of things here<br><br>

                    <p class="text-lg">
                    ・You can register/edit/delete your experiment data.<br>
                    ・You can search experiment data of coating.<br><br>
                    {{-- ・You can edit csv files.<br></p><br> --}}

                    <p class="text-xl">If you find some error, please tell ozaki.</p>
            

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
