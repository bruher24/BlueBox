@extends('products.layout')
@section('products.title')
    Товары
@endsection
@section('products.content')

    <div class="container">
        <a href="{{route('products.form')}}">
            <button class="btn btn-success">Добавить товар</button>
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
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.details', $product->id) }}" class="btn btn-sm btn-secondary">Подробнее</a>
                        <a href="{{ route('products.form', $product->id) }}" class="btn btn-sm btn-warning">Изменить</a>
                        <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display:inline;">
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
