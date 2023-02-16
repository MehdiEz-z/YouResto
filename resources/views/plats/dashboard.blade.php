<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12">
                @if ($message = Session::get('success'))
                    <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                        {{$message}}
                    </div>
                @endif
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <a href="{{ route('plats.create') }}">
                        <button class="block text-white bg-cyan-500 hover:bg-cyan-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Ajouter un plat
                        </button>
                    </a>
                    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                            <thead class="bg-slate-100">
                                <tr>
                                    {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th> --}}
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Image</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                               
                                @foreach ($plats as $plat)
                                <tr class="hover:bg-gray-50">  
                                    <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                        <div class="relative h-10 w-10">
                                            <img
                                                class="h-full w-full rounded-lg object-cover object-center"
                                                src="{{ asset('storage/'. $plat->image)}}" alt="Image du plat"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        <div class="font-medium text-gray-700">{{ $plat->title }}</div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold text-ellipsis overflow-hidden" style="width: 100%">
                                            {{ $plat->description }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">{{ $plat->date }}</td>
                                    
                                    <td class="px-6 py-4">
                                        <div class="flex justify-end gap-4">
                                            <a href="{{ route('plats.show', $plat->id)}}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                            <a href="{{ route('plats.edit', $plat->id)}}" class="text-amber-300 hover:text-amber-500 mb-2 mr-2">Edit</a>
                                            <form class="inline-block" action="{{ route('plats.destroy', $plat->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:text-red-700 mb-2 mr-2">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>   
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="container mx-auto px-5 py-2">
                            {!! $plats->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
