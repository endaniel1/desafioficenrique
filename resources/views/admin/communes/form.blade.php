<div class="">
    <label for="name" class="px-4 pt-4 block text-base font-medium text-[#07074D]" >
        Nombre
    </label>
    <div class="p-4">
        <input type="text" name="name" id="name" value="{{ old('name', $commune->name) }}" placeholder="Nombre de la comuna" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
        @if($errors->has('name'))       
            
        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <div>
                <span class="font-medium">{{ $errors->first('name') }}</span>.
            </div>  
        </div>
        @endif
    </div>
</div>
<div class="">
    <label for="description" class="px-4 pt-4 block text-base font-medium text-[#07074D]" >
        Descripción
    </label>
    <div class="p-4">
        <textarea rows="4" name="description" id="description" placeholder="Type your message" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            {{ old('description', $commune->description) }}   
        </textarea>
        
        <jet-input-error for="description" class="mt-2" />
    </div>
</div>
<div class="p-4">
    <button type="submit" class="hover:shadow-form rounded-md bg-sky-500/100 py-3 px-8 text-base font-semibold text-white outline-none">
        {{ $commune->name ? __('Actualizar') : __('Agregar') }}
    </button>
    <a href="{{route('communes.index')}}" class="hover:shadow-form rounded-md  py-3 px-8 text-base font-semibold text-black outline-none">
        Cancelar
     </a>
</div>