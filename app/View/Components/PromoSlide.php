<?php
namespace App\View\Components;

use Illuminate\View\Component;

class PromoSlide extends Component
{
    public $image;
    public $url;
    public $title;

    public function __construct($image, $url, $title)
    {
        $this->image = $image;
        $this->url = $url;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.promo-slide');
    }
}
