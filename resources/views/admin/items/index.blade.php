<x-app-layout>
    <div class="flex flex-col justify-center h-full m-10">
        
        <div id="message" class="my-3 px-3 py-2 rounded border border-green-600 bg-green-200 text-green-600 text-sm font-bold" {{ !session()->has('message') ? 'hidden' : '' }}>
            {{ session()->has('message') ? session()->get('message') : '' }}
        </div>
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                    
                        <div class="col-span-12 md:col-span-8">
                            <h2 class="font-semibold text-gray-800">Rubro Agregadas</h2> 
                        </div>
                        <div class="col-span-12 md:col-span-4">

                            <p class=" text-center">
                            <a href="{{ route('items.create') }}" class="px-3 py-2 font-semibold uppercase text-sm text-white bg-green-600 hover:bg-green-500 tracking-wider rounded-md transition">Nueva</a> 
                            </p>
                        </div>
                    </div>                
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Descripción</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach($items as $item)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">{{ $item->name }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            @if($item->description)
                                                {{ $item->description }}
                                            @else
                                            Ninguna
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <a href="{{ route('items.edit', $item) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <form action="{{ route('items.delete', $item) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>                                                    
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>