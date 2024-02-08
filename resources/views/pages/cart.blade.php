@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mt-5">
        Корзина
    </h1>
    <div class="row mb-4">
        <div class="col-12 col-lg-8">
            <livewire:cart.items-list />
        </div>
        <div class="col-12 col-lg-4">
            <livewire:cart.total />
        </div>
    </div>
</div>
@endsection
