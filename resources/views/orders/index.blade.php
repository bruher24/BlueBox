@extends('orders.layout')
@section('orders.title')
    Заказы
@endsection
@section('orders.content')

    <div class="container">
        <a href="{{route('orders.form')}}">
            <button class="btn btn-success mb-1">Добавить заказ</button>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Дата создания</th>
                <th>ФИО покупателя</th>
                <th>Статус</th>
                <th>Полная стоимость</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->created_at->timezone('Europe/Samara')->format('H:i d.m.Y') }}</td>
                    <td>{{ $order->client_name }}</td>
                    <td>{{ $order->status->label() }}</td>
                    <td>{{ $order->product->price * $order->quantity }}</td>
                    <td>
                        <a href="{{ route('orders.details', $order->id) }}" class="btn btn-sm btn-secondary">Подробнее</a>
                        <form action="{{ route('orders.delete', $order->id) }}" method="POST" style="display:inline;">
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
