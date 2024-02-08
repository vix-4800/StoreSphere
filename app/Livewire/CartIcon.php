<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{
    public $items;

    public function mount()
    {
        $this->items = auth()->check() ?  auth()->user()->cartItems : collect();
    }

    #[On('item-quantity-changed')]
    public function render()
    {
        return view('livewire.cart-icon');
    }
}
