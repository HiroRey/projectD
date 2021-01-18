@extends('layouts.welcome')

@section('title', 'Категория:')


@section('content')


        @foreach($elements as $el)
        <div class="">

            <a href="{{ route('category', $el->code)}}">
                <img src="{{ Storage::url($el->image) }}" width="80" height="80">
                <h2>{{$el->name}}</h2>
            </a>
            <p>
               {{$el->description}}
            </p>
        </div>
        @endforeach


@endsection
