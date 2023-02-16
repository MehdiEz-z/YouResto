<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plats') }}
        </h2>
    </x-slot>
    
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 my-10 flex flex-col mx-10 my-10">
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <strong>Whoops!</strong> There were some problems with your input.
                </div>
            @endif
            <form action="{{ route('plats.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                        Title
                        </label>
                        <input  name="title" id="title" type="text" value="{{ old('title')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('title')
                            <span class="text-red-600">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                        Date
                        </label>
                        <input type="date" name="date" id="date" value="{{ old('date')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('date')
                            <span class="text-red-600">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="descriptio">
                        dessription
                        </label>
                        <textarea name="description" id="description" style="height: 150px"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >{{ old('description')}}</textarea>
                        @error('description')
                            <span class="text-red-600">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>

                <div class="-mx-3 md:flex mb-2">
                    <div class="md:w-4/5 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                        Image
                        </label>
                        <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        @error('image')
                            <span class="text-red-600">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="md:w-1/5 px-3 mb-6 md:mb-0 pt-6 flex justify-end">
                        <button type="submit" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-12 py-2.5 text-center mr-2 mb-2">Add</button>
                    </div>
                </div>
            </form>
        </div>
    
</x-app-layout>