@extends('products.layout')
@section('products.title')
    Детали товара
@endsection
@section('products.content')

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
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->name . ' (' . $product->category_id . ')' }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $product->price }}</td>
            </tr>
            </tbody>
        </table>

        <a href="{{ route('products.index') }}">
            <button class="btn btn-dark">Назад</button>
        </a>
        <a href="{{ route('products.form', $product->id) }}">
            <button class="btn btn-warning">Изменить</button>
        </a>
        <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">Удалить</button>
        </form>

    </div>
@endsection
