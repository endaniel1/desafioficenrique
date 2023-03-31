<x-app-layout>
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 m-10">
        <form action="{{ route('items.update', $item) }}" method="POST" class="m-10">
            @csrf
            
            {{ method_field('PUT') }}

            @include("admin.items.form")
        </form>
    </div>
</x-app-layout>