<?php

namespace App\Livewire\Cart;

use DivisionByZeroError;
use Livewire\Component;

class ItemsList extends Component
{
    /**
     * User items from the cart
     */
    public $items;

    /**
     * Discount for all items
     */
    public int $totalDiscount;

    /**
     * Mount function
     */
    public function mount(): void
    {
        $this->items = auth()->user()->cartItems->where('quantity', '>', 0);

        $cartItems = auth()->user()->cartItems()->with('item')->get();

        $sumWithoutDiscount = 0;
        foreach ($cartItems as $cartItem) {
            if ($cartItem->item->has_discount) {
                $sumWithoutDiscount += $cartItem->item->price * $cartItem->quantity;
            }
        }

        $points = auth()->user()->points;
        $sumWithDiscount = $sumWithoutDiscount - $points;

        try {
            $this->totalDiscount = 100 - round(($sumWithDiscount / $sumWithoutDiscount) * 100);
        } catch (DivisionByZeroError) {
            $this->totalDiscount = 0;
        }
    }

    /**
     * Render function
     */
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.cart.items-list');
    }
}
