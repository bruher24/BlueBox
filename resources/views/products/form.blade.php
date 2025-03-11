@extends('layout')
@section('title')
    Товар
@endsection
@section('navbar')
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="{{ route('products') }}" class="nav-link active" aria-current="page">Товары</a></li>
        <li class="nav-item"><a href="{{ route('orders') }}" class="nav-link">Заказы</a></li>
    </ul>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container" style="max-width:600px;margin:60px auto;">
        <form role="form" class="form-control" method="post" action="{{ isset($product) ? route('products.update', $product->product_id) : route('products.add') }}">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            <div class="input-group">
                <label class="form-label" for="product_name">
                    Название:
                    <input class="form-control" id="product_name" name="product_name" type="text" @if(isset($product))value="{{$product->product_name}}" @endif>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="category_id">
                    Категория:
                    <select class="form-select form-control" id="category_id" name="category_id" >
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" @if(isset($product) && $product->category_id === $category->category_id) selected @endif>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="description">
                    Описание:
                    <textarea class="form-control" id="description" name="description" placeholder="Введите текст..." >@if(isset($product)){{$product->description}}@endif</textarea>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="price">
                    Цена:
                    <input class="form-control" id="price" name="price" type="number" @if(isset($product))value="{{ $product->price }}" @endif>
                </label>
            </div>
            <input class="btn btn-dark" type="submit">
        </form>
        <a href="{{ route('products') }}">
            <button class="btn btn-dark">Назад</button>
        </a>

    </div>
@endsection
