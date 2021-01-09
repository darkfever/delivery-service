@extends('layouts.user_layout')

@section('title','Заказы')

@section('content')
<div class="container-fluid dashboard-content" style="max-width: 1600px;">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Создание нового заказа</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="owner_id" class="col-md-2 col-form-label text-md-right">Инициатор</label>
                            <div class="col-md-3">
                                <label id="owner_id" class="form-control" name="owner_id">{{auth()->user()->fio}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="from" class="col-md-2 col-form-label text-md-right">Откуда</label>
                            <div class="col-md-4">
                                <input id="from" type="text" class="form-control" name="from" value="" required autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="to" class="col-md-2 col-form-label text-md-right">Куда</label>
                            <div class="col-md-4">
                                <input id="to" type="text" class="form-control" name="to" value="" required autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="preference" class="col-md-2 col-form-label text-md-right">Пожелания</label>
                            <div class="col-md-4">
                                <input id="preference" type="text" class="form-control" name="preference" value="" required autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="weight" class="col-md-2 col-form-label text-md-right">Вес</label>
                            <div class="col-md-1">
                                <input id="weight" type="text" class="form-control" name="weight" value="" required autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-md-2 col-form-label text-md-right">Размер</label>
                            <div class="col-md-1">
                                <input id="size" type="text" class="form-control" name="size" value="" required autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recipient_contacts" class="col-md-2 col-form-label text-md-right">Контакты получателя</label>
                            <div class="col-md-2">
                                <input id="recipient_contacts" type="text" class="form-control" name="recipient_contacts" value="" required autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recipient_contacts" class="col-md-2 col-form-label text-md-right">Желаемая дата доставки</label>
                            <div class="col-md-2">
                                <input type="date" id="date" name="approximate_time" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">Создать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection