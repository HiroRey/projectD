@extends('layouts.welcome')

@section('title',  __('main.product'))


@section('content')


        <h1>{{ $product->__('name')}}</h1>
        <h2>{{$product->category->__('name')}}</h2>
        <p>@lang('product.price'): <b>{{$product->price}} ₽</b></p>
        <img src="{{Storage::url($product->image)}}" width="350" height="300">
        <p>{{$product->__('description') }}</p>

        <form action="{{route('basket-add', $product->id)}}" method="POST">
            @if($product->isAvailable())
            <button type="submit" class="btn btn-success" role="button">@lang('product.add_to_cart')</button>
            @else
            @lang('product.not_available')
        @endif
           @csrf
@endsection
