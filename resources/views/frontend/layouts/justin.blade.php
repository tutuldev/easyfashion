<section class="px-4 py-8 bg-white">
        <h2 class="text-3xl md:text-4xl  text-green-600 font-bold mb-8 md:mb-10 text-center">JUST IN</h2>

 <div class="max-w-screen-xl mx-auto grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
@foreach($justin_products as $product)
    @php
        $img = $product->images[0] ?? null;

        $imgUrl = $img
            ? (Str::startsWith($img, 'products/')
                ? asset('storage/' . $img)
                : asset($img))
            : asset('images/default.webp');
    @endphp

    <x-product-card
        :id="$product->id"
        :name="$product->name"
        :price="$product->price"
        :comparePrice="$product->compare_at_price"
        :sku="$product->sku"
        :sizes="['S', 'M', 'L', 'XL']"
        :image="$imgUrl"
    />
@endforeach
</div>


<div class="flex justify-center items-center py-5 font-semibold">
  <a href="/another-page"
     class="inline-flex gap-5 items-center px-8 py-2 bg-green-500 text-white rounded  transition group duration-300">

    <!-- Icon -->
    <span class="material-icons border rounded-full transform transition-transform duration-300 group-hover:translate-x-2">
      chevron_right
    </span>
    <span>SHOP ALL</span>
  </a>
</div>

</section>


