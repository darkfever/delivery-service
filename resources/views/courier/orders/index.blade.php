@extends('layouts.courier_layout')

@section('title','Заказы')

@section('content')
<div class="container-fluid dashboard-content ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Заказы в работе</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered second dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30px;">Номер</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;">Инициатор</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 99px;">Откуда</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 99px;">Куда</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 95px;">Контакты получателя</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 78px;">Стоимость</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 50px;">Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    {{ $order->id }}
                                                </td>
                                                <td>
                                                    {{ $order->owner->fio }}
                                                </td>
                                                <td>
                                                    {{ $order->from }}
                                                </td>
                                                <td>
                                                    {{ $order->to }}
                                                </td>
                                                <td>
                                                    {{ $order->recipient_contacts }}
                                                </td>
                                                <td>
                                                    {{ $order->sum }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('courierupdate', $order->id) }}">
                                                        <i class="fas fa-check-square"></i>Доставлен
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection