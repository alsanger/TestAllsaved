@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Статистика</div>
                <div class="card-body">
                    <p>Це Dashboard панель адміністратора.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Активність</div>
                <div class="card-body">
                    <p>Тут можна відображати останню активність.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
