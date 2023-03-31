<x-app-layout>
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 m-10">
        <form action="{{ route('document_files.store') }}" method="POST" class="m-10">
            @csrf
            
            @include("admin.document_files.form")
        </form>
    </div>
</x-app-layout>