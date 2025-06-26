@extends('backend.app')
@section('title', 'Edit - ' . $category->name)


@section('content')
<div class="max-w-xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-md border border-gray-100">


    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2 mb-6">
      <span class="material-symbols-outlined text-blue-500">edit</span>
      Edit Category
    </h2>


<form action="{{ route('categories.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
        <input type="text" id="name" name="name" placeholder="Enter category name"
               value="{{ old('name', $category->name) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        @error('name')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4" id="current-image-container">
        @if ($category->image)
            <label class="block text-sm font-medium text-gray-700 mb-1">Current Image</label>
            <div class="relative w-32 h-32">
                @php
                    $currentImageUrl = Str::startsWith($category->image, 'categories/')
                        ? asset('storage/' . $category->image)
                        : asset($category->image);
                @endphp
                <img src="{{ $currentImageUrl }}" class="w-full h-full object-cover rounded shadow" alt="Current Category Image">
                <button type="button" id="remove-current-image-btn"
                        class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center cursor-pointer">
                    ✕
                </button>
            </div>
        @endif
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload New Image (Optional)</label>
        <input type="file" id="image" name="image" accept="image/*"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <div id="new-image-preview" class="flex flex-wrap gap-3 mt-3"></div>
        @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div id="removed-image-input-wrapper"></div>

    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
        Update Category
    </button>
</form>



</div>
@endsection

@push('scripts-bk')
<script>
    const newFileInput = document.getElementById('image');
    const newImagePreviewBox = document.getElementById('new-image-preview');

    const currentImageContainer = document.getElementById('current-image-container');
    const removeCurrentImageBtn = document.getElementById('remove-current-image-btn');
    const removedImageInputWrapper = document.getElementById('removed-image-input-wrapper');

    newFileInput.addEventListener('change', e => {
        newImagePreviewBox.innerHTML = '';

        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = ev => {
                const wrap = document.createElement('div');
                wrap.className = 'relative w-24 h-24';
                wrap.innerHTML = `
                    <img src="${ev.target.result}" class="w-full h-full object-cover rounded shadow">
                    <button type="button" data-action="remove-new-image"
                            class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center cursor-pointer">
                        ✕
                    </button>`;
                newImagePreviewBox.appendChild(wrap);
            };
            reader.readAsDataURL(file);

            if (currentImageContainer) {
                currentImageContainer.classList.add('hidden');
            }
            addRemoveImageHiddenInput();

        } else {
            newImagePreviewBox.innerHTML = '';
            if (currentImageContainer) {
                currentImageContainer.classList.remove('hidden');
            }
            removeRemoveImageHiddenInput();
        }
    });

    newImagePreviewBox.addEventListener('click', e => {
        const removeNewBtn = e.target.closest('button[data-action="remove-new-image"]');
        if (removeNewBtn) {
            newImagePreviewBox.innerHTML = '';
            newFileInput.value = '';
            if (currentImageContainer) {
                currentImageContainer.classList.remove('hidden');
            }
            removeRemoveImageHiddenInput();
        }
    });

    if (removeCurrentImageBtn) {
        removeCurrentImageBtn.addEventListener('click', () => {
            currentImageContainer.innerHTML = '';
            addRemoveImageHiddenInput();
            newFileInput.value = '';
            newImagePreviewBox.innerHTML = '';
        });
    }

    function addRemoveImageHiddenInput() {
        if (!document.getElementById('remove_image_hidden')) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'remove_image';
            hiddenInput.value = '1';
            hiddenInput.id = 'remove_image_hidden';
            removedImageInputWrapper.appendChild(hiddenInput);
        }
    }

    function removeRemoveImageHiddenInput() {
        const hiddenInput = document.getElementById('remove_image_hidden');
        if (hiddenInput) {
            hiddenInput.remove();
        }
    }
</script>
@endpush
