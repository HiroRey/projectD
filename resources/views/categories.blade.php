@extends('layouts.welcome')

@section('title',  __('main.all_categories'))


@section('content')


        @foreach($elements as $el)
        <div class="">
            <a href="{{ route('category', $el->code)}}">
                <img src="{{ Storage::url($el->image) }}" width="80" height="80">
                <h2>{{$el->__('name')}}</h2>
            </a>
            <p>
               {{$el->__('description')}}
            </p>
        </div>
        @endforeach


@endsection
