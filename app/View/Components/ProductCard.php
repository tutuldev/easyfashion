<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Closure;

class ProductCard extends Component
{
    /**
     * সব ডায়নামিক ডাটা constructor‑এ ইনজেক্ট করছি
     * (property promotion – PHP 8+)।
     */
    public function __construct(
        public int $id,
        public string $name,
        public int $price,
        public string $image,
        public array $sizes = [],
        public ?string $sku = null,
        public array $categories = [],
    ) {}

    /**
     * কোন Blade view রেন্ডার হবে তা রিটার্ন করি।
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
