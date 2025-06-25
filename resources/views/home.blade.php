
@extends('frontend.app')
@section('title', 'Home')
@section('content')
 {{-- banner  --}}
    @include('frontend.layouts.banner')
    @include('frontend.layouts.tranding')
    @include('frontend.layouts.polo-collections', ['products' => $products])
    @include('frontend.layouts.product-category')
    @include('frontend.layouts.jins')
    @include('frontend.layouts.social')
    @include('frontend.layouts.video')
    @include('frontend.layouts.justin')
    @include('frontend.layouts.process')
    @include('frontend.layouts.followus')

@endsection
