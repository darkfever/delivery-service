@extends('layouts.admin_layout')

@section('title','Заказы')

@section('content')
<div class="container-fluid dashboard-content ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Просмотр заказа {{$orders->id }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="owner_id" class="col-md-2 col-form-label text-md-right">Инициатор</label>
                        <div class="col-md-3">
                            <input id="owner_id" type="text" class="form-control" name="owner_id" value="{{ $orders->owner->fio }}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="operator_id" class="col-md-2 col-form-label text-md-right">Оператор</label>
                        <div class="col-md-3">
                            <input id="operator_id" type="text" class="form-control" name="operator_id" @if(isset($orders->operator)) value="{{ $orders->operator->fio }}" @endif required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="courier_id" class="col-md-2 col-form-label text-md-right">Курьер</label>
                        <div class="col-md-3">
                            <input id="courier_id" type="text" class="form-control" name="courier_id" @if(isset($orders->courier)) value="{{ $orders->courier->fio }}" @endif required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="from" class="col-md-2 col-form-label text-md-right">Откуда</label>
                        <div class="col-md-4">
                            <input id="from" type="text" class="form-control" name="from" value="{{$orders->from}}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="to" class="col-md-2 col-form-label text-md-right">Куда</label>
                        <div class="col-md-4">
                            <input id="to" type="text" class="form-control" name="to" value="{{$orders->to}}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="preference" class="col-md-2 col-form-label text-md-right">Пожелания</label>
                        <div class="col-md-4">
                            <input id="preference" type="text" class="form-control" name="preference" value="{{$orders->preference}}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="weight" class="col-md-2 col-form-label text-md-right">Вес</label>
                        <div class="col-md-1">
                            <input id="weight" type="text" class="form-control" name="weight" value="{{$orders->weight}}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label text-md-right">Размер</label>
                        <div class="col-md-1">
                            <input id="size" type="text" class="form-control" name="size" value="{{$orders->size}}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label text-md-right">Статус</label>
                        <div class="col-md-2">
                            <input id="status" type="text" class="form-control" name="status" value="{{$orders->status}}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sum" class="col-md-2 col-form-label text-md-right">Стоимость</label>
                        <div class="col-md-2">
                            <input id="sum" type="text" class="form-control" name="sum" value="{{$orders->sum}}" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{route('orders.index')}}" class="btn btn-success">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection