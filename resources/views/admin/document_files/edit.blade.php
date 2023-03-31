<x-app-layout>
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 m-10">
        <form action="{{ route('document_files.update', $document_file) }}" method="POST" class="m-10">
            @csrf
            
            {{ method_field('PUT') }}

            @include("admin.document_files.form")
        </form>
    </div>
</x-app-layout>