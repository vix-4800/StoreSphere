<div>
    @foreach ($items as $item)
    <livewire:cart.item-card wire:key='{{$item->id}}' :itemId='$item->id' :totalDiscount='$totalDiscount' />
    @endforeach
</div>
