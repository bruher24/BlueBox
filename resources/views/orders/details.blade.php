@extends('layout')
@section('title')
    Детали заказа
@endsection
@section('navbar')
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="{{ route('products') }}" class="nav-link">Товары</a></li>
        <li class="nav-item"><a href="{{ route('orders') }}" class="nav-link active"  aria-current="page">Заказы</a></li>
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
                <td>{{ $order->order_id }}</td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td>{{ date_format($order->created_at, "hh:ii dd.mm.yyyy") }}</td>
            </tr>
            <tr>
                <td>ФИО покупателя</td>
                <td>{{ $order->client_name }}</td>
            </tr>
            <tr>
                <td>Товар(ID)</td>
                <td>{{ $order->product_id }}</td>
            </tr>
            <tr>
                <td>Количество</td>
                <td>{{ $order->quantity }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $order->product->price * $order->product->quantity }}</td>
            </tr>
            <tr>
                <td>Статус</td>
                <td>
                    @if($order->status === "new")
                        Новый
                    @else
                        Выполнен
                    @endif
                </td>
            </tr>
            <tr>
                <td>Комментарий</td>
                <td>{{ $order->comment }}</td>
            </tr>
            </tbody>
        </table>

        <a href="{{ route('orders') }}">
            <button class="btn btn-dark">Назад</button>
        </a>
        <form action="{{ route('orders.done', $order->order_id) }}" method="POST" style="@if($order->status === "done") display:none; @else display:inline; @endif">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success">Выполнить</button>
        </form>
        <a href="{{ route('orders.delete', $order->order_id) }}">
            <button class="btn btn-danger">Удалить</button>
        </a>

    </div>
@endsection
