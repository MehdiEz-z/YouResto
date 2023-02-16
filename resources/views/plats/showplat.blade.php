<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plats') }}
        </h2>
    </x-slot>

    @php
        $date = Carbon\Carbon::parse($plats->date);
        $formattedDate = $date->format("l j F Y");
    @endphp
    
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-10 mx-auto">
        
        <img class="p-8 rounded-t-lg h-72 w-full object-cover" src="{{ asset('storage/'. $plats->image)}}" alt="plat image" />
    
        <div class="px-5 pb-5">
            <h1 class="flex justify-center text-xl font-bold tracking-tight text-gray-900 dark:text-white mb-4">{{ $plats->title }}</h1>
            <h6 class="flex justify-center text-l font-semibold tracking-tight text-gray-900 dark:text-white mb-4">{{ $plats->description }}</h6>
            <div class="flex justify-center">
                <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $formattedDate }}</span>
            </div>
        </div>

    </div>
    
</x-app-layout>