@extends('backend.app')
@section('title', 'Create Product')

@section('content')

    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2 mb-6">
        <span class="material-symbols-outlined text-blue-500">add</span>
        Add New Product
    </h2>


<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="w-full bg-white p-6 rounded-lg shadow space-y-4">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
        <input type="text" id="name" name="name" placeholder="Enter product name"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ old('name') }}" required />
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea id="description" name="description"
        class="w-full border border-gray-300 rounded p-2" rows="6">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Current Price (৳)</label>
        <input type="number" id="price" name="price" step="0.01"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ old('price') }}" required />
        @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="compare_at_price" class="block text-sm font-medium text-gray-700 mb-1">Compare at Price (৳) <span class="text-gray-500">(Optional)</span></label>
        <input type="number" id="compare_at_price" name="compare_at_price" step="0.01"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ old('compare_at_price') }}" />
        @error('compare_at_price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="cost_price" class="block text-sm font-medium text-gray-700 mb-1">Cost Price (৳) <span class="text-gray-500">(Internal, Optional)</span></label>
        <input type="number" id="cost_price" name="cost_price" step="0.01"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ old('cost_price') }}" />
        @error('cost_price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="sku" class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
        <input type="text" id="sku" name="sku" placeholder="Enter SKU (e.g., ABC-123)"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ old('sku') }}" />
        @error('sku')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="quantity_in_stock" class="block text-sm font-medium text-gray-700 mb-1">Quantity in Stock</label>
        <input type="number" id="quantity_in_stock" name="quantity_in_stock" min="0"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ old('quantity_in_stock', 0) }}" required />
        @error('quantity_in_stock')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="active" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <select id="active" name="active"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="1" {{ old('active', true) ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !old('active', true) ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('active')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
        <select id="category_id" name="category_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Upload Images (Optional)</label>
        <input type="file" id="images" name="images[]" multiple accept="image/*"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               onchange="previewImages(event)" />
        <div id="image-preview" class="flex flex-wrap gap-3 mt-3"></div>
        @error('images.*')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Create Product
    </button>
</form>

@if($errors->any())
    <div class="bg-red-100 text-red-800 p-2 rounded mt-4">
        <ul class="list-disc pl-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

@push('scripts-bk')
{{-- // tinymce --}}
<script src="https://cdn.tiny.cloud/1/geb2o1qxfu1e6ygw5i81yv3l1mrmai8c6sdxx4wn6lwhdlm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
        tinymce.init({
        selector: '#description',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
        height: 300,
        valid_elements: 'p,b,strong,i,em,u,ul,ol,li,a[href|target],img[src|alt|width|height],table,tr,td,th,thead,tbody,tfoot,br,span[style]',
        invalid_elements: 'script,iframe,object,embed',
        convert_urls: false,
        forced_root_block: 'p',
        force_p_newlines: true,
        cleanup: true,
        verify_html: true,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>

<script>
    // Image Preview
    const fileInput = document.getElementById('images');
    const previewBox = document.getElementById('image-preview');
    let filesChosen = [];

    fileInput.addEventListener('change', e => {
        filesChosen = Array.from(e.target.files);
        renderThumbs();
    });

    function renderThumbs() {
        previewBox.innerHTML = '';
        const dt = new DataTransfer();

        filesChosen.forEach((file, idx) => {
            dt.items.add(file);

            const reader = new FileReader();
            reader.onload = ev => {
                const wrap = document.createElement('div');
                wrap.className = 'relative w-24 h-24';

                wrap.innerHTML = `
                    <img src="${ev.target.result}" class="w-full h-full object-cover rounded shadow">
                    <button type="button" data-i="${idx}"
                            class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                        ✕
                    </button>`;
                previewBox.appendChild(wrap);
            };
            reader.readAsDataURL(file);
        });

        fileInput.files = dt.files;
    }

    previewBox.addEventListener('click', e => {
        const btn = e.target.closest('button[data-i]');
        if (!btn) return;
        const i = +btn.dataset.i;
        filesChosen.splice(i, 1);
        renderThumbs();
    });
</script>
@endpush
