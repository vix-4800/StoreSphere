<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{
    public $items;

    #[On('item-quantity-change')]
    public function render()
    {
        $this->items = auth()->check() ?
            auth()->user()->cartItems :
            collect();

        return view('livewire.cart-icon');
    }
}
