@extends('auth.orders.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ old('code', isset($product) ? $product->code : null) }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ old('name', isset($product) ? $product->name : null) }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name_en" class="col-sm-2 col-form-label">Название en: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name_en" id="name_en"
                               value="@isset($product){{ $product->name_en }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                        @if($product->category_id == $category->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea name="description" id="description" cols="72"
                                  rows="7">{{ old('description', isset($product) ? $product->description : null) }}</textarea>
                    </div>
                </div>

                    <div class="input-group row">
                        <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                        <div class="col-sm-6">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="price" id="price" value="{{ old('price', isset($product) ? $product->price : null) }}" type="number">
                        </div>
                    </div>
                <br>
                    <div class="input-group row">
                        <label for="count" class="col-sm-2 col-form-label">Количество: </label>
                        <div class="col-sm-6">
                            @error('count')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="count" id="count" value="{{ old('count', isset($product) ? $product->count : null) }}" type="number">
                        </div>
                    </div>
                    <br>
                <div class="input-group row">
                    <label for="description_en" class="col-sm-2 col-form-label">Описание en: </label>
                    <div class="col-sm-6">
                        <textarea name="description_en" id="description_en" cols="72"
                                  rows="7">@isset($product){{ $product->description_en }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file"  style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>

{{--                <div class="input-group row">--}}
{{--                    <label for="category_id" class="col-sm-2 col-form-label">Свойства товара: </label>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <select name="property_id[]" multiple>--}}
{{--                            @foreach($properties as $property)--}}
{{--                                <option value="{{ $property->id }}"--}}
{{--                                        @isset($product)--}}
{{--                                        @if($product->properties->contains($property->id))--}}
{{--                                        selected--}}
{{--                                    @endif--}}
{{--                                    @endisset--}}
{{--                                >{{ $property->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <br>--}}

                @foreach ([
                'hit' => 'Хит',
                'new' => 'Новинка',
                'recommend' => 'Рекомендуемые'
                ] as $field => $title)
                    <div class="form-group row">
                        <label for="{{$field}}" class="col-sm-2 col-form-label">{{ $title }}: </label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="{{$field}}" id="{{$field}}"
                                   @if(isset($product) && $product->$field === 1)
                                   checked="'checked"
                                @endif
                            >
                        </div>
                    </div>
                    <br>
                @endforeach
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
