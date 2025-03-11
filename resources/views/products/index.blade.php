@extends('layout')
@section('title')
    Товары
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
        <a href="{{route('products.form')}}">
            <button class="btn btn-dark">Добавить товар</button>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>
                        @switch($product->category_id)
                            @case('1')
                                Легкий
                                @break
                            @case('2')
                                Тяжелый
                                @break
                            @case('3')
                                Хрупкий
                                @break
                        @endswitch
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.details', $product->product_id) }}" class="btn btn-sm btn-dark">Подробнее</a>
                        <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-sm btn-success">Изменить</a>
                        <form action="{{ route('products.delete', $product->product_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
