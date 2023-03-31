<x-app-layout>
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 m-10">
        <form action="{{ route('entrepreneurships.update', $entrepreneurship) }}" method="POST" class="m-10">
            @csrf   
            
            {{ method_field('PUT') }}

            @if(session('errorDocument'))
            <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                <div>
                    <span class="font-medium">{{ session('errorDocument') }}</span>.
                </div>  
            </div>
            @endif
            
            <div class="">
                <label for="item" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Rubros
                </label>
                
                <div class="p-2">
                    <select id="item" name="item" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Selecione un rubro</option>
                        @foreach($items as $item)            
                        <option value="{{ $item->id }}" {{ old('item', $entrepreneurship->item_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>

                    @if($errors->has('item'))       
                    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <div>
                            <span class="font-medium">{{ $errors->first('item') }}</span>.
                        </div>  
                    </div>
                    @endif
                </div>
            </div>
            <div class="">
                <label for="commune" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Comunas
                </label>
                
                <div class="p-2">
                    <select id="commune" name="commune" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Selecione una comuna</option>
                        @foreach($communes as $commune)            
                        <option value="{{ $commune->id }}" {{ old('commune', $entrepreneurship->commune_id) == $commune->id ? 'selected' : '' }}>{{ $commune->name }}</option>
                        @endforeach
                    </select>

                    @if($errors->has('commune'))       
                    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <div>
                            <span class="font-medium">{{ $errors->first('commune') }}</span>.
                        </div>  
                    </div>
                    @endif
                </div>
            </div>
                
            <div class="">
                <label for="description" class="px-4 pt-4 block text-base font-medium text-[#07074D]" >
                    Descripción del Emprendimiento
                </label>
                <div class="p-4">
                    <textarea rows="4" name="description" id="description" placeholder="Type your message" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        {{ old('description', $entrepreneurship->description) }}   
                    </textarea>
                    
                    <jet-input-error for="description" class="mt-2" />
                </div>
            </div>  

            <div class="">   
                @if($entrepreneurship->status == 0)         
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                @elseif($entrepreneurship->status == 1)
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                @else
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                @endif
                    @foreach($documentFiles as $documentFile)
                        <p>- {{$documentFile}}.</p>
                    @endforeach
                </div>
            </div>

            <div class="">
                <div class="p-2">
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" {{ $entrepreneurship->status == 0 ? 'selected' : '' }}>Pendiente</option>
                        <option value="1" {{ $entrepreneurship->status == 1 ? 'selected' : '' }}>Aprobar</option>
                        <option value="2" {{ $entrepreneurship->status == 2 ? 'selected' : '' }}>Rechazar</option>                       
                    </select>

                    @if($errors->has('commune'))       
                    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <div>
                            <span class="font-medium">{{ $errors->first('commune') }}</span>.
                        </div>  
                    </div>
                    @endif
                </div>
            </div>
                    
            <div class="p-4">
                <button type="submit" class="hover:shadow-form rounded-md bg-sky-500/100 py-3 px-8 text-base font-semibold text-white outline-none">
                    {{ $entrepreneurship->commune_id ? __('Actualizar') : __('Emprender') }}
                </button>
                <a href="{{route('dashboard')}}" class="hover:shadow-form rounded-md  py-3 px-8 text-base font-semibold text-black outline-none">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</x-app-layout>