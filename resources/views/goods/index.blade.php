<x-layout>
    <x-slot:heading>
        Goods
    </x-slot:heading>
    
    <div class="grid grid-cols-3 gap-4">
        @foreach ($goods as $good)    
            <div class="w-200 rounded-lg bg-gray-800 p-5 flex flex-col h-full">
                <img class="w-full h-auto max-h-64 object-contain" src="{{ $good->img_url }}" alt="" />
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $good->item_name }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $good->item_description }}</p>
                <a href="goods/{{ $good->id }}" class="inline-flex items-center px-3 py-2 mt-auto text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors duration-300">
                    Прочитать больше
                     <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                
            </div>
        @endforeach
    </div>
</x-layout>