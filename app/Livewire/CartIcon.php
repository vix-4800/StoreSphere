<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{
    /**
     * User items added to the cart
     */
    public Collection|array $items;

    /**
     * Render function
     */
    #[On('item-quantity-change')]
    public function render(): \Illuminate\Contracts\View\View
    {
        $this->items = auth()->check() ?
            auth()->user()->cartItems :
            collect();

        return view('livewire.cart-icon');
    }
}
