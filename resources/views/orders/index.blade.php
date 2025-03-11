@extends('layout')
@section('title')
    Заказы
@endsection
@section('navbar')
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="{{ route('products') }}" class="nav-link">Товары</a></li>
        <li class="nav-item"><a href="{{ route('orders') }}" class="nav-link active" aria-current="page">Заказы</a></li>
    </ul>
@endsection
@section('content')

    <div class="container">
        <a href="{{route('orders.form')}}">
            <button class="btn btn-dark">Добавить заказ</button>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Дата создания</th>
                <th>ФИО покупателя</th>
                <th>Статус</th>
                <th>Полная стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->created_at->timezone('Europe/Moscow')->format('H:i d.m.Y') }}</td>
                    <td>{{ $order->client_name }}</td>
                    <td>
                        @if($order->status === "new")
                            Новый
                        @else
                            Выполнен
                        @endif
                    </td>
                    <td>{{ $order->product->price * $order->quantity }}</td>
                    <td>
                        <a href="{{ route('orders.details', $order->order_id) }}" class="btn btn-sm btn-dark">Подробнее</a>
                        <form action="{{ route('orders.delete', $order->order_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот заказ?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
