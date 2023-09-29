@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="mb-4">Ошибка 403</h1>
                        <p>У вас нет доступа к этой странице.</p>
                        <a href="{{ route('index') }}" class="btn btn-secondary">Вернуться назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
