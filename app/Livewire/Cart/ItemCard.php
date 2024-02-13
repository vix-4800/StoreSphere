<?php

namespace App\Livewire\Cart;

use App\Models\CartItem;
use App\Models\Item;
use Livewire\Component;

/**
 * Represents a single item in user cart
 */
class ItemCard extends Component
{
    public Item $item;

    /**
     * Item quantity from user cart
     *
     * @var [type]
     */
    public int $quantity;

    /**
     * Item price without discount
     *
     * @var integer
     */
    public int $price1;

    /**
     * Item price with discount
     *
     * @var integer
     */
    public int $price2;

    /**
     * Mount function
     */
    public function mount(int $itemId): void
    {
        $cardItem = CartItem::find($itemId);

        $this->quantity = $cardItem->quantity;
        $this->item = $cardItem->item;
        $this->price1 = $this->item->price;

        if ($this->item->has_discount) {
            if (auth()->user()->points > $this->price1 * $cardItem->quantity) {
                $this->price2 = 0;
            } else {
                $this->price2 = ($this->price1 * $this->quantity - auth()->user()->points) / $this->quantity;
            }
        } else {
            $this->price2 = $this->price1;
        }
    }

    /**
     * Render function
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.cart.item-card');
    }
}
