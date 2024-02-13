<?php

namespace App\Livewire\Cart;

use App\Models\CartItem;
use Livewire\Component;

class ItemCard extends Component
{
    public int $quantity;
    public int $price1;

    public int $price2;

    public function mount(int $itemId): void
    {
        $cardItem = CartItem::find($itemId);

        $this->quantity = $cardItem->quantity;
        $this->item = $this->cardItem->item;
        $this->price1 = $this->item->price;

        if ($this->item->has_discount) {
            if (auth()->user()->points > $this->price1 * $this->cardItem->quantity) {
                $this->price2 = 0;
            } else {
                $this->price2 = ($this->price1 * $this->quantity - auth()->user()->points) / $this->quantity;
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
