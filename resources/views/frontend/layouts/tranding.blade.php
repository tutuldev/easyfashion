<section class="trending bg-white py-8 px-4">
 <div class="flex flex-col md:flex-row max-w-screen-xl gap-8 mx-auto">

          @foreach($trending as $category)
         <a href="{{ route('category.single.show', $category->slug) }}"
         class="relative w-full h-[530px] group/item overflow-hidden rounded-lg shadow-lg"
     style="background-image:url('{{ $category->image ? (Str::startsWith($category->image, 'categories/') ? asset('storage/' . $category->image) : asset($category->image)) : '' }}');background-size:cover;background-position:center;">

    <img src="{{ $category->image ? (Str::startsWith($category->image, 'categories/') ? asset('storage/' . $category->image) : asset($category->image)) : '' }}"
         alt="{{ $category->name }}"
         class="hidden"
         onerror="this.onerror=null;this.src='https://placehold.co/800x530/cccccc/333333?text=Image+Not+Found';">


    <div class="absolute inset-0 bg-black/20 transition-all duration-700 ease-in-out
                md:group-hover/item:opacity-0"></div>


    <div class="absolute inset-0 flex flex-col justify-between text-white p-7 md:p-20">
        <div>

            <h2 class="text-3xl md:text-5xl font-bold leading-tight">{{ strtoupper($category->name) }}</h2>
        </div>

        <div class="space-y-4 transition-all duration-700 ease-in-out
                    opacity-100 translate-x-0
                    md:opacity-0 md:translate-x-10
                    md:group-hover/item:translate-x-0 md:group-hover/item:opacity-100">

            <p class="text-2xl md:text-3xl">Check what's new</p>

            <button class="group inline-flex items-center justify-center
                           w-40 h-8 rounded-sm border border-white hover:border-2
                           text-white font-semibold space-x-2 transition duration-300 ease-in-out">
                <span class="text-sm">CLICK HERE</span>

                <span class="block h-0.5 w-6 bg-white origin-center transform
                               scale-x-100 group-hover:scale-x-50
                               transition-transform duration-300 ease-in-out"></span>
            </button>
        </div>
    </div>
         </a>
        @endforeach


 </div>
</section
