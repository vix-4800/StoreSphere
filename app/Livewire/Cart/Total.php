<?php

namespace App\Livewire\Cart;

use DivisionByZeroError;
use Livewire\Component;

class Total extends Component
{
    /**
     * Purchase sum without discount
     */
    public int $sumWithoutDiscount = 0;

    /**
     * Purchase sum with discount
     */
    public int $sumWithDiscount;

    /**
     * Discount value (in percent)
     */
    public int $totalDiscount;

    /**
     * Mount function
     */
    public function mount(): void
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

    /**
     * Render function
     */
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.cart.total');
    }

    /**
     * Confirm the purchase
     *
     * @return void
     */
    public function order()
    {
        // dd(['response' => 'ok']);
    }
}
