@extends('layouts.user_layout')

@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Внимение!!!</h1>
    <p class="lead">После получения стоимости и подтверждения заказа отозвать оформленный заказ не получится, так как после вашего подтверждения заказ принимается в работу мгновенно!</p>
    <a class="btn btn-outline-success" href="{{route('userorders.create')}}" role="button">Оформить новый заказ</a>
</div>
<div class="container" style="max-width: 100%;">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#Номер заказа</th>
                <th scope="col">Откуда</th>
                <th scope="col">Куда</th>
                <th scope="col">Пожелания</th>
                <th scope="col">Размер</th>
                <th scope="col">Вес</th>
                <th scope="col">Стоимость KZT</th>
                <th scope="col">Время доставки</th>
                <th scope="col">Время оформления</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->from}}</td>
                <td>{{$order->to}}</td>
                <td>{{$order->preference}}</td>
                <td>{{$order->size}}</td>
                <td>{{$order->weight}}</td>
                <td>{{$order->sum}}</td>
                <td>{{$order->approximate_time}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <?php
                    if ($order->status === 'created') {
                        echo 'На подтверджении';
                    } elseif ($order->status === 'delivered') {
                        echo 'Успешно завершен';
                    } else {
                        echo 'Ожидает подверждения';
                    }
                    ?>
                </td>
                <td>
                    @if($order->status === 'created')
                    <a class="btn btn-outline-primary disabled" href="{{ route('update', $order->id) }}" role="button">Ожидайте</a>
                    @elseif($order->status === 'delivered')
                    <a class="btn btn-outline-success disabled" href="{{ route('update', $order->id) }}" role="button">Завершен</a>
                    @else
                    <a class="btn btn-outline-success" href="{{ route('update', $order->id) }}" role="button">Подтвердить</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection