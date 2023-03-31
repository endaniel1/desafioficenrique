<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-right">
           <a href="{{ route('entrepreneurships.create') }}"> Emprendimiento Nuevo + </a>
        </h2>
    </x-slot>
    <div class="text-center mt-4">
        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Listado de emprendimientos</h2>
    </div>
    <div class="max-w-sm w-full lg:max-w-full lg:flex">
        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
    </div>
    @foreach($entrepreneurships as $entrepreneurship)
    <div class="border-r border-b border-l border-gray-400 lg:border-l lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">            
            <p class="text-gray-700 text-base text-center">{{ $entrepreneurship->description }}</p>
        </div>
        <div class="text-center">
            Detalles:
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"> {{ $entrepreneurship->item->name }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"> {{ $entrepreneurship->commune->name }}</span>
            @if ($entrepreneurship->status == 0)
            <span class="inline-block bg-orange-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"># 
            Pendiente
            </span>
            @elseif ($entrepreneurship->status == 1)
            <span class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"># 
            Aceptada
            </span>
            @else
            <span class="inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"># 
            Rechazada
            </span>
            @endif
        </div>

        @if(Auth::user()->isRol("admin"))
        <div class="mt-8 text-center">
            <a href="{{ route('entrepreneurships.edit', $entrepreneurship) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Ver Documentos
            </a>
        </div>
        @endif
        
    </div>
    @endforeach
</x-app-layout>
