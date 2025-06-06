@extends('backend.app')
@section('title', 'Edit Product')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2 mb-6">
        <span class="material-symbols-outlined text-yellow-500">edit</span>
        Edit Product
    </h2>

    <form action="{{ route('products.update', $product->slug) }}" method="POST" enctype="multipart/form-data"
          class="w-full bg-white p-6 rounded-lg shadow space-y-4">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $product->name) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="description" name="description"
                      class="w-full border border-gray-300 rounded p-2" rows="6">{{ old('description', $product->description) }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price (৳)</label>
            <input type="number" id="price" name="price" step="0.01"
                   value="{{ old('price', $product->price) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <select id="category_id" name="category_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Existing Images -->
     <!-- Existing Images -->
@if ($product->images && count($product->images))
    <div>
        <p id="oldImagesLabel" class="text-sm font-medium text-gray-700 mb-2">Existing Images</p>
        <div id="existing-images" class="flex flex-wrap gap-4">
            @foreach($product->images as $image)
                <div class="relative w-24 h-24">
                    <img src="{{ asset('storage/' . $image) }}"
                         class="w-full h-full object-cover rounded shadow">
                    <!-- ❌ Remove Button -->
                    <button type="button"
                            class="old-del absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center"
                            data-path="{{ $image }}">
                        ✕
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Hidden inputs added via JS for removed images -->
        <div id="removedImagesWrapper"></div>
    </div>
@endif


        <!-- Upload New Images -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Add More Images (Optional)</label>
            <input type="file" id="images" name="images[]" multiple accept="image/*"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   onchange="previewImages(event)" />
            <div id="image-preview" class="flex flex-wrap gap-3 mt-3"></div>
            @error('images.*') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 transition duration-200">
            Update Product
        </button>
    </form>
@endsection

@push('scripts-bk')
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/geb2o1qxfu1e6ygw5i81yv3l1mrmai8c6sdxx4wn6lwhdlm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    // TinyMCE for description
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

    // Image Preview
// ==== IMAGE PREVIEW + REMOVE (New Images) ====
const fileInput = document.getElementById('images');
const previewBox = document.getElementById('image-preview');
let filesChosen = [];

fileInput.addEventListener('change', e => {
    filesChosen.push(...Array.from(e.target.files));
    renderThumbs();
    toggleNewImagesLabel();
});

function renderThumbs() {
    // প্রিভিউ বক্স পরিষ্কার
    previewBox.innerHTML = '';

    // নতুন FileList বানাতে DataTransfer
    const dt = new DataTransfer();

    // প্রতিটি নতুন ছবি লুপ
    filesChosen.forEach((file, idx) => {
        dt.items.add(file);   // FileList-এ যোগ করি

        const reader = new FileReader();
        reader.onload = ev => {
            // প্রতি ইমেজের wrapper div
            const wrap = document.createElement('div');
            wrap.className = 'relative w-24 h-24';

            // থাম্ব + ✕ বাটন
            wrap.innerHTML = `
                <img src="${ev.target.result}" class="w-full h-full object-cover rounded shadow">
                <button type="button" data-i="${idx}"
                        class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                    ✕
                </button>`;
            previewBox.appendChild(wrap);
        };
        reader.readAsDataURL(file);
    });

    // ইনপুটের FileList আপডেট
    fileInput.files = dt.files;

    // Tailwind label toggle for new images
    const lbl = document.getElementById('new-images-label'); // <label id="new-images-label" … hidden>
    if (filesChosen.length) {
        lbl.classList.remove('hidden');   // ছবি আছে → লেবেল দেখাও
    } else {
        lbl.classList.add('hidden');      // কোনো ছবি নেই → লুকাও
    }
}

// New images preview থেকে remove করার ইভেন্ট
previewBox.addEventListener('click', e => {
    const btn = e.target.closest('button[data-i]');
    if (!btn) return;
    const i = +btn.dataset.i;
    filesChosen.splice(i, 1);
    renderThumbs();
    toggleNewImagesLabel();
});

function toggleNewImagesLabel() {
    const newImagesLabel = document.querySelector('label[for="images"]');
    if (filesChosen.length === 0) {
        newImagesLabel.style.display = 'none';
    } else {
        newImagesLabel.style.display = 'block';
    }
}

// ==== OLD IMAGES REMOVE + HIDDEN INPUT + LABEL TOGGLE ====
const oldImagesLabel = document.getElementById('oldImagesLabel'); // পুরানো ইমেজের লেবেল
const existingImagesContainer = document.getElementById('existing-images');
const removedImagesWrapper = document.getElementById('removedImagesWrapper');
let removedOldImages = [];

existingImagesContainer.addEventListener('click', e => {
    const btn = e.target.closest('.old-del');
    if (!btn) return;

    const imgPath = btn.dataset.path; // data-path attribute থেকে আসবে
    removedOldImages.push(imgPath);

    // Hidden input form এ যুক্ত করি যাতে সার্ভারে ডাটা যায়
    const hidden = document.createElement('input');
    hidden.type = 'hidden';
    hidden.name = 'remove_images[]';
    hidden.value = imgPath;
    removedImagesWrapper.appendChild(hidden);

    // DOM থেকে ইমেজ remove
    btn.closest('div.relative').remove();

    // লেবেল টগল করবো একটু ডিলে দিয়ে যাতে DOM আপডেট হয়
    toggleOldImagesLabel();
});

function toggleOldImagesLabel() {
    setTimeout(() => {
        if (existingImagesContainer.children.length === 0) {
            oldImagesLabel.style.display = 'none';
        } else {
            oldImagesLabel.style.display = 'block';
        }
    }, 50);
}

// পেজ লোড হওয়ার সময় একবার লেবেল চেক করে নেয়া
toggleOldImagesLabel();
toggleNewImagesLabel();

</script>
@endpush
