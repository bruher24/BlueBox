@php use App\Enums\StatusEnum; @endphp
@extends('orders.layout')
@section('orders.title')
    Заказ
@endsection
@section('orders.content')
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
        <form role="form" class="form-control" method="post" action="{{ route('orders.create') }}">
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
                        <option selected disabled>Выберите товар...</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
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
                    <textarea class="form-control" id="comment" name="comment"
                              placeholder="Введите текст..."></textarea>
                </label>
            </div>
            <div class="input-group">
                <label class="form-label" for="status">
                    Статус:
                    <select class="form-select form-control" id="status" name="status">
                        @foreach(StatusEnum::cases() as $status)
                            <option value="{{ $status->value }}">{{ $status->label() }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <input class="btn btn-success" type="submit" value="Сохранить">
        </form>
        <a href="{{ route('orders.index') }}">
            <button class="btn btn-dark">Назад</button>
        </a>

    </div>
@endsection
