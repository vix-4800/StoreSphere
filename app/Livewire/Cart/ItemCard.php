<?php

namespace App\Livewire\Cart;

use App\Models\CartItem;
use Livewire\Component;

class ItemCard extends Component
{
    public $item;

    public $cardItem;

    public int $price1;

    public int $price2;

    public int $totalDiscount;

    public function mount(int $itemId, int $totalDiscount)
    {
        $this->cardItem = CartItem::find($itemId);
        $this->item = $this->cardItem->item;
        $this->price1 = $this->item->price;

        if ($this->item->has_discount) {
            if (auth()->user()->points > $this->price1 * $this->cardItem->quantity) {
                $this->price2 = 0;
            } else {
                $this->price2 = ($this->price1 * $this->cardItem->quantity - auth()->user()->points) / $this->cardItem->quantity;
            }
        } else {
            $this->price2 = $this->price1;
        }
    }

    public function render()
    {
        return view('livewire.cart.item-card');
    }
}
