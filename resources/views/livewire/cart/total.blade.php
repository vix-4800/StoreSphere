<div class="card p-3 mt-4">
    <p class="fs-4">
        Общая сумма заказа:
    </p>
    <p class="fw-bold">
        {{ $sumWithoutDiscount }} ₽
    </p>
    <p class="fs-4">
        <span>
            {{$totalDiscount === 0 ? 'Скидка отсутсвует' : 'Общая сумма заказа c учётом скидки '.$totalDiscount.'%:'}}
    </p>
    <p class="fw-bold">
        {{ $sumWithDiscount }} ₽
    </p>
    <button class="btn btn-primary" type="button" wire:click='order'>
        Заказать
    </button>
</div>
