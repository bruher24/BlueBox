@extends('layout')
@section('title')
    Детали товара
@endsection
@section('navbar')
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="{{ route('products') }}" class="nav-link active" aria-current="page">Товары</a></li>
        <li class="nav-item"><a href="{{ route('orders') }}" class="nav-link">Заказы</a></li>
    </ul>
@endsection
@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Поле</th>
                <th>Значение</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>ID</td>
                <td>{{ $product->product_id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->product_name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>
                    @switch($product->category_id)
                        @case('1')
                            Легкий(1)
                            @break
                        @case('2')
                            Тяжелый(2)
                            @break
                        @case('3')
                            Хрупкий(3)
                            @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $product->price }}</td>
            </tr>
            </tbody>
        </table>

        <a href="{{ route('products') }}">
            <button class="btn btn-dark">Назад</button>
        </a>
        <a href="{{ route('products.edit', $product->product_id) }}">
            <button class="btn btn-success">Изменить</button>
        </a>
        <a href="{{ route('products.delete', $product->product_id) }}">
            <button class="btn btn-danger">Удалить</button>
        </a>

    </div>
@endsection
