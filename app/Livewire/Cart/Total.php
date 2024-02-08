<?php

namespace App\Livewire\Cart;

use DivisionByZeroError;
use Livewire\Component;

class Total extends Component
{
    public $sumWithoutDiscount = 0;
    public $sumWithDiscount;
    public int $totalDiscount;

    public function mount()
    {
        $cartItems = auth()->user()->cartItems()->with('item')->get();

        foreach ($cartItems as $cartItem) {
            $this->sumWithoutDiscount += $cartItem->item->price * $cartItem->quantity;
        }

        $points = auth()->user()->points;
        if ($points > 0) {
            $discountable = 0;
            foreach ($cartItems as $cartItem) {
                if ($cartItem->item->has_discount) {
                    $discountable += $cartItem->item->price * $cartItem->quantity;
                }
            }

            if ($discountable > 0) {
                if ($points > $discountable) {
                    $points = $discountable;
                }

                $this->sumWithDiscount = $this->sumWithoutDiscount - $points;

                try {
                    $this->totalDiscount = 100 - round(($this->sumWithDiscount / $this->sumWithoutDiscount * 100));
                } catch (DivisionByZeroError) {
                    $this->totalDiscount = 0;
                }
            } else {
                $this->sumWithDiscount = $this->sumWithoutDiscount;
                $this->totalDiscount = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.cart.total');
    }

    public function order()
    {
        // dd(['response' => 'ok']);
    }
}
