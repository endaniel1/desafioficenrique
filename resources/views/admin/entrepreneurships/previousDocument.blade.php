<x-app-layout>
    

<div class="flex justify-center">
    <div
        class="block max-w-sm rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
        <h5
        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
        ¡Su Emprendimiento ha sido registrado con exito!
        </h5>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
        Ahora el siguiente paso, es presentar los documento a las sede correspondiente
        </p>
        <div class="">            
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                @foreach($documentFiles as $documentFile)
                    <p>- {{$documentFile}}.</p>
                @endforeach
            </div>
        </div>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200 mt-2">
        Nota: ante de salir de esta pagina escriba, anote o tome un foto a los documentos a presentar.
        </p>
        <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Cerrar
        </a>
    </div>
</div>

</x-app-layout>