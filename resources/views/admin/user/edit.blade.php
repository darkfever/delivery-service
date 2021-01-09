@extends('layouts.admin_layout')

@section('title','Пользователи')

@section('content')
<div class="container-fluid dashboard-content ">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Редактирование пользователя</div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('ФИО') }}</label>
                        <div class="col-md-6">
                            <input id="fio" type="text" class="form-control" name="fio" value="{{ $user->fio }}" required autocomplete="fio" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Номер телефона') }}</label>
                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role_name" class="col-md-4 col-form-label text-md-right">{{ __('Роль') }}</label>
                        <div class="col-md-6">
                            <select id="role_name" type="text" class="form-control" name="role_name" id="input-select">
                                <option selected>{{ $user->role->name }}</option>
                                @foreach($roles as $role)
                                <option>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection