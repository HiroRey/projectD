@extends('layouts.welcome')

@section('title', 'Товар')


@section('content')


        <h1>{{ $product->name }}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>Price: <b>{{$product->price}} ₽</b></p>
        <img src="{{Storage::url($product->image)}}" width="550" height="300">
        <p>{{$product->description}}</p>

        <form action="{{route('basket-add', $product->id)}}" method="POST">
            @if($product->isAvailable())
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
            @else
            Нету в наличии
        @endif
           @csrf
@endsection
