<article class="card mt-4 overflow-hidden @if($item->has_discount) border-primary @endif">
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="img-wrap">
                <img class="w-100" src="{{ asset($item->image_path) }}" alt="Изображение товара">
            </div>
        </div>
        <div class="col-12 col-sm-8 d-flex align-items-center">
            <div class="p-3">
                <h3 class="fs-6 mb-2">
                    {{ $item->name }}
                </h3>
                <p>
                    Кол-во - {{$cardItem->quantity}} шт.
                </p>
                <p class="fw-bold fs-6 m-0">
                    {{$item->has_discount ? 'цена' : 'цена без скидки'}} - {{ $price1 }} ₽ / шт.
                </p>

                @if ($item->has_discount)
                <p class="fw-bold fs-6 m-0">
                    с учётом скидки <span>{{ round(100 - $price2 / $price1 * 100) }}%</span> - {{ $price2 }} ₽ / шт.
                </p>
                @endif
            </div>
        </div>
    </div>
</article>
