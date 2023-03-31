<div class="">
    <label for="item" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Rubros
    </label>
    
    <div class="p-2">
        <select id="item" name="item" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Selecione un rubro</option>
            @foreach($items as $item)            
            <option value="{{ $item->id }}" {{ old('item', $document_file->item_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
            <option value="{{ $commune->id }}"  {{ old('commune', $document_file->commune_id) == $commune->id ? 'selected' : '' }}>{{ $commune->name }}</option>
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
    <label for="document_archive" class="px-4 pt-4 block text-base font-medium text-[#07074D]" >
        Documentos de archivos
    </label>
    <div class="p-4">
        <input type="text" name="document_archive" id="document_archive" value="{{ old('document_archive', $document_file->documents) }}" placeholder="Archivos Solicitado" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
        <div class="flex bg-orange-100 rounded-lg p-4 mb-4 text-sm text-orange-700" role="alert">
            <div>
                <span class="font-medium">Escriba los Archivo, debe de estar separado por ",". Ej: 'Permisos de importación, Cédula de identidad, Permiso de obras'</span>.
            </div>  
        </div>
        @if($errors->has('document_archive'))
        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <div>
                <span class="font-medium">{{ $errors->first('document_archive') }}</span>.
            </div>  
        </div>
        @endif
    </div>
</div>

<div class="p-4">
    <button type="submit" class="hover:shadow-form rounded-md bg-sky-500/100 py-3 px-8 text-base font-semibold text-white outline-none">
        {{ $document_file->id_item ? __('Actualizar') : __('Agregar') }}
    </button>
    <a href="{{route('document_files.index')}}" class="hover:shadow-form rounded-md  py-3 px-8 text-base font-semibold text-black outline-none">
        Cancelar
     </a>
</div>