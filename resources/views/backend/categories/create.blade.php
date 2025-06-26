@extends('backend.app')
@section('title', 'Create Category')

@section('content')
<div class="max-w-xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-md border border-gray-100">


    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2 mb-6">
      <span class="material-symbols-outlined text-blue-500">add</span>
      Add New Category
    </h2>



<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
        <input type="text" id="name" name="name" placeholder="Enter category name"
             value="{{ old('name') }}"
             class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        @error('name')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Single Image Upload Field --}}
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Upload Image (Optional)</label>
        <input type="file" id="image" name="image" accept="image/*"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <div id="image-preview" class="flex flex-wrap gap-3 mt-3"></div>
        @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    {{-- End Single Image Upload Field --}}

    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
        Create Category
    </button>
</form>
</div>
@endsection
@push('scripts-bk')
<script>
    const fileInput = document.getElementById('image');
    const previewBox = document.getElementById('image-preview');

    fileInput.addEventListener('change', e => {
        previewBox.innerHTML = '';

        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = ev => {
                const wrap = document.createElement('div');
                wrap.className = 'relative w-24 h-24';

                wrap.innerHTML = `
                    <img src="${ev.target.result}" class="w-full h-full object-cover rounded shadow">
                    <button type="button" data-action="remove-image"
                            class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center cursor-pointer">
                        ✕
                    </button>`;
                previewBox.appendChild(wrap);
            };
            reader.readAsDataURL(file);
        }
    });

    previewBox.addEventListener('click', e => {
        const removeBtn = e.target.closest('button[data-action="remove-image"]');
        if (removeBtn) {
            previewBox.innerHTML = '';
            fileInput.value = '';
        }
    });
</script>

@endpush
