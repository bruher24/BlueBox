@extends('layout')
@section('title')
    Заказ
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
        <form role="form" class="form-control" method="post" action="{{ route('orders.add') }}">
            @csrf

            <div class="input-group">
                <label class="form-label" for="client_name">
                    ФИО:
                    <input class="form-control" id="client_name" name="client_name" type="text">
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="product_id">
                    Товар:
                    <select class="form-select form-control" id="product_id" name="product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="quantity">
                    Количество:
                    <input class="form-control" id="quantity" name="quantity" type="number" min="1" value="1">
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="comment">
                    Комментарий:
                    <textarea class="form-control" id="comment" name="comment" placeholder="Введите текст..."></textarea>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="status">
                    Статус:
                    <select class="form-select form-control" id="status" name="status">
                        <option value="new" selected>Новый</option>
                        <option value="done">Выполнен</option>
                    </select>
                </label>
            </div>
            <input class="btn btn-dark" type="submit">
        </form>
        <a href="{{ route('orders') }}">
            <button class="btn btn-dark">Назад</button>
        </a>

    </div>
@endsection
