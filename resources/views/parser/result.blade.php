@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($data['images'] as $image)
                <div class="col-md-3 border border-4">
                    <img src="{{ $image }}" class="img-fluid">
                </div>
            @endforeach
        </div>
        <p class="text-center fs-2 text-primary">На странице обнаружено {{$data['countAmountImage']}} изображений на {{$data['countSizeImage']}}
            Мб.</p>
    </div>
@endsection






