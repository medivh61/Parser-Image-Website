@extends('layouts.app')
@section('content')

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <form method="POST" action="{{ route('parse') }}" class="text-center">
            @csrf
            <h4>Парсинг изображений с сайта</h4>
            <div class="input-group mb-3">
                <input type="url" name="url" class="form-control form-control-lg" placeholder="Укажите URL сайта">
            </div>
            <button type="submit" class="btn btn-primary">Go</button>
        </form>
    </div>
@endsection
