
@extends('frontend.app')
@section('title', 'Home')
@section('content')
 {{-- banner  --}}
    @include('frontend.layouts.banner')
    @include('frontend.layouts.tranding')
    @include('frontend.layouts.polo-collections')


@endsection
