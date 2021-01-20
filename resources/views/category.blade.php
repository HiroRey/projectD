@extends('layouts.welcome')


@section('title', __('main.title') . @isset($category->name) ? $category->name : '')


@section('content')



        <h1>
            {{$category->__('name') }} {{$category->products->count()}}
        </h1>
        <p>
            {{$category->__('description') }}
        </p>

        <div class="row">
            @foreach($category->products()->with('category')->get() as $product)
                @include('layouts.card', ['product' => $product])
            @endforeach
        </div>

@endsection

