@extends('layout')
@section('title')
    BlueBox
@endsection
@section('content')
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img
                    src="https://img.freepik.com/free-psd/3d-rendering-delivery-sales-blank-banner_23-2151558566.jpg?t=st=1741692906~exp=1741696506~hmac=c872a1702d46c21a80f10d9071062ac3c72084e1688a9f8b5100afb46f333ed0&w=996"
                    class="rounded d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
                    loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Система управления товарами и заказами</h1>
                <p class="lead">Простое и доступное добавление, редактирование,просмотр и удаление товаров и заказов для
                    Вас.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ route('products.list') }}">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Товары</button>
                    </a>
                    <a href="{{ route('orders.list') }}">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Заказы</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
