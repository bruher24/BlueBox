@extends('products.layout')
@section('products.title')
    Товар
@endsection
@section('products.content')
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
        <form role="form" class="form-control" method="post"
              action="{{ isset($product) ? route('products.update', $product->id) : route('products.create') }}">
            @csrf
            @if(isset($product))
                @method('PUT')
                <input type="hidden" name="product_id" value="{{ $product->id }}">
            @endif
            <div class="input-group">
                <label class="form-label" for="product_name">
                    Название:
                    <input class="form-control" id="product_name" name="name" type="text" placeholder="Введите название"
                           value="{{ isset($product) ? $product->name : '' }}">
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="category_id">
                    Категория:
                    <select class="form-select form-control" id="category_id" name="category_id" >
                        <option selected disabled>Выберите категорию...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if(isset($product) && $product->category_id === $category->id)
                                    selected
                                @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="description">
                    Описание:
                    <textarea class="form-control" id="description" name="description"
                              placeholder="Введите текст...">{{ isset($product) ? $product->description : '' }}</textarea>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="price">
                    Цена:
                    <input class="form-control" id="price" name="price" type="number" min="0.1" step="0.01" placeholder="123.45"
                           value="{{ isset($product) ? $product->price : '' }}">
                </label>
            </div>
            <input class="btn btn-success" type="submit" value="Сохранить">
        </form>
        <a href="{{ route('products.index') }}">
            <button class="btn btn-dark">Назад</button>
        </a>

    </div>
@endsection
