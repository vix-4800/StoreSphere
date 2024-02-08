<article class="card mt-5 overflow-hidden @if ($item->has_discount) border-primary @endif" style="width: 300px">
    <div class="img-wrap">
        <img class="w-100 py-5" src="{{ asset($item->image_path) }}" alt="Изображение товара">
    </div>
    <div class="p-3">
        <h3 class="fs-6 mb-3">
            {{$item->name}}
        </h3>
        <div class="d-flex align-items-center justify-content-between">
            <p class="fw-bold fs-5 m-0">
                {{$item->price}} ₽
            </p>

            @guest
            <a class="btn btn-primary" href="{{route('login')}}">
                В корзину
            </a>
            @endguest

            @auth

            @if ($addedItem && $addedItem->quantity !== 0)
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-outline-primary" wire:click='remove'>
                    -
                </button>
                <span>
                    {{ $addedItem->quantity }}
                </span>
                <button class="btn btn-outline-primary" wire:click='add'>
                    +
                </button>
            </div>
            @else
            <button class="btn btn-primary" wire:click='addNew'>
                В корзину
            </button>
            @endif
            @endauth
        </div>
    </div>
</article>
