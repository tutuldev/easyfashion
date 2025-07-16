
@extends('frontend.app')
@section('title', 'Home')
@section('content')
    {{-- banner --}}
    @include('frontend.layouts.banner')
    @include('frontend.layouts.tranding', ['trending' => $trending])
    @include('frontend.layouts.polo-collections', ['products' => $products])
    @include('frontend.layouts.product-category', ['commonSubategories' => $commonSubategories, 'panjabi' => $panjabi])
    @include('frontend.layouts.jins')
    @include('frontend.layouts.social')
    @include('frontend.layouts.video')
    @include('frontend.layouts.justin', ['justin_products' => $justin_products])
    @include('frontend.layouts.process')
    @include('frontend.layouts.followus')

@endsection
