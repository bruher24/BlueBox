@php use App\Enums\StatusEnum; @endphp
@extends('orders.layout')
@section('orders.title')
    Детали заказа
@endsection
@section('orders.content')

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
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td>{{ $order->created_at->timezone('Europe/Samara')->format('H:i d.m.Y') }}</td>
            </tr>
            <tr>
                <td>ФИО покупателя</td>
                <td>{{ $order->client_name }}</td>
            </tr>
            <tr>
                <td>Товар(ID)</td>
                <td>{{ $order->id }}</td>
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
                <td>{{ $order->status->label() }}</td>
            </tr>
            <tr>
                <td>Комментарий</td>
                <td>{{ $order->comment }}</td>
            </tr>
            </tbody>
        </table>

        <a href="{{ route('orders.index') }}">
            <button class="btn btn-dark">Назад</button>
        </a>
        @if($order->status != StatusEnum::Done)
            <form action="{{ route('orders.complete', $order->id) }}" method="POST"
                  style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Выполнить</button>
            </form>
        @endif
        <form action="{{ route('orders.delete', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Вы уверены, что хотите удалить этот заказ?')">Удалить
            </button>
        </form>

    </div>
@endsection
