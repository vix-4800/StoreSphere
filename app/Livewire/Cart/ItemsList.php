<?php

namespace App\Livewire\Cart;

use DivisionByZeroError;
use Livewire\Component;

class ItemsList extends Component
{
    public $items;

    public int $totalDiscount;

    public function mount()
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

    public function render()
    {
        return view('livewire.cart.items-list');
    }
}
