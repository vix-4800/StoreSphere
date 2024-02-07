@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="d-flex flex-wrap column-gap-5">
            @foreach ($items as $item)
            <!-- TODO: добавлять синюю рамку карточке товара (класс border-primary), если на товар можно потратить баллы -->
            <article class="card mt-5 overflow-hidden border-primary" style="width: 350px">
                <div class="img-wrap">
                    <img class="w-100" src="{{$item->image_path}}" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        {{$item->name}}
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            {{$item->price}}₽
                        </p>
                        <button class="btn btn-primary" form="itemForm_{{$item->id}}" type="submit">
                            В корзину
                        </button>

                        <form id="itemForm_{{$item->id}}" action="{{route('cart.add',['itemId'=>$item->id])}}" method="post">
                            @csrf
                        </form>

                        <!-- TODO: этот блок появлется после нажатия кнопки "В корзину" -->
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination my-5 d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

@endsection
