
@extends('frontend.app')
@section('title', 'Home')
@section('content')
 {{-- banner  --}}
    @include('frontend.layouts.banner')
    @include('frontend.layouts.tranding', ['trendingCategories' => $trendingCategories])
    @include('frontend.layouts.polo-collections', ['products' => $products])
    @include('frontend.layouts.product-category', ['commonCategories' => $commonCategories])
    @include('frontend.layouts.jins')
    @include('frontend.layouts.social')
    @include('frontend.layouts.video')
    @include('frontend.layouts.justin')
    @include('frontend.layouts.process')
    @include('frontend.layouts.followus')

@endsection
