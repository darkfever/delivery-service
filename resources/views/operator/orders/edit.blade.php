@extends('layouts.operator_layout')

@section('title','Заказы')

@section('content')
<div class="container-fluid dashboard-content ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Обработка заказа {{$orders->id }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('operorder.update', $orders->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="owner_id" class="col-md-2 col-form-label text-md-right">Инициатор</label>
                            <div class="col-md-3">
                                <label for="owner_id" name="owner_id" class="form-control">{{ $orders->owner->fio }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="operator_id" class="col-md-2 col-form-label text-md-right">Оператор</label>
                            <div class="col-md-3">
                                <label for="operator_id" name="operator_id" class="form-control">{{ auth()->user()->fio }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="from" class="col-md-2 col-form-label text-md-right">Откуда</label>
                            <div class="col-md-4">
                                <label name="from" class="form-control">{{$orders->from}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="to" class="col-md-2 col-form-label text-md-right">Куда</label>
                            <div class="col-md-4">
                                <label name="to" class="form-control">{{$orders->to}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="preference" class="col-md-2 col-form-label text-md-right">Пожелания</label>
                            <div class="col-md-3">
                                <textarea id="w3review" name="preference" rows="4" cols="57" readonly>{{$orders->preference}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="weight" class="col-md-2 col-form-label text-md-right">Вес</label>
                            <div class="col-md-1">
                                <label name="weight" class="form-control">{{$orders->weight}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-md-2 col-form-label text-md-right">Размер</label>
                            <div class="col-md-1">
                                <label name="size" class="form-control">{{$orders->size}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="courier_id" class="col-md-2 col-form-label text-md-right">Курьер</label>
                            <div class="col-md-3">
                                <select id="courier_id" type="text" class="form-control" name="courier_id" id="input-select" required>
                                    <option></option>
                                    @foreach($couriers as $courier)
                                    @foreach($courier->couriers as $user_courier)
                                    <option>{{$user_courier->fio}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
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
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection