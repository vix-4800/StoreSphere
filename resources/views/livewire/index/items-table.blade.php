<div>
    <div>
        <div class="flex-wrap d-flex column-gap-4">
            @foreach ($items as $index => $item)
            <article class="card mt-5 overflow-hidden @if ($item->has_discount) border-primary @endif" style="width: 300px">
                <div class="img-wrap">
                    <img class="py-5 w-100" src="{{ asset($item->image_path) }}" alt="Изображение товара">
                </div>

                <div class="p-3">
                    <h3 class="mb-3 fs-6">
                        {{$item->name}}
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="m-0 fw-bold fs-5">
                            {{$item->price}} ₽
                        </p>

                        @guest
                        <a class="btn btn-primary" href="{{route('login')}}">
                            В корзину
                        </a>
                        @endguest

                        @auth
                        @if(in_array($item->id, $userItems->toArray()))
                        <div class="gap-3 d-flex align-items-center">
                            <button class="btn btn-outline-primary" wire:click='remove({{$item->id}})'>
                                -
                            </button>
                            <span>
                                {{ App\Models\CartItem::firstWhere('item_id',$item->id)->quantity }}
                            </span>
                            <button class="btn btn-outline-primary" wire:click='add({{$item->id}})'>
                                +
                            </button>
                        </div>
                        @else
                        <button class="btn btn-primary" wire:click='add({{$item->id}})'>
                            В корзину
                        </button>
                        @endif
                        @endauth
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>

    <nav aria-label="Page navigation" role="navigation">
        <ul class="pagination my-5 d-flex justify-content-center">
            <li class="page-item">
                <button class="page-link" aria-label="Previous">
                    <span aria-hidden="true">
                        «
                    </span>
                </button>
            </li>

            <li class="page-item">
                <button class="page-link">
                    1
                </button>
            </li>

            <li class="page-item">
                <button class="page-link">
                    2
                </button>
            </li>
            <li class="page-item">
                <button class="page-link">
                    3
                </button>
            </li>
            <li class="page-item">
                <button class="page-link" aria-label="Next">
                    <span aria-hidden="true">
                        »
                    </span>
                </button>
            </li>
        </ul>
    </nav>
</div>
