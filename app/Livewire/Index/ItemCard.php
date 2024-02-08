<?php

namespace App\Livewire\Index;

use App\Models\CartItem;
use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;

class ItemCard extends Component
{
    public $item;

    public $userItems;

    public CartItem|null $addedItem = null;

    public function mount(int $itemId, $userItems)
    {
        $this->item = Item::find($itemId);
        $this->userItems = $userItems;

        if (isset($userItems, $itemId)) {
            $this->addedItem = CartItem::where('item_id', $itemId)->first();
        }
    }

    #[On(['item-quantity-changed'])]
    public function render()
    {
        return view('livewire.index.item-card');
    }

    public function addNew()
    {
        if ($this->addedItem) {
            $this->addedItem->quantity++;
            $this->addedItem->save();
        } else {
            $this->addedItem = CartItem::create([
                'user_id' => auth()->id(),
                'item_id' => $this->item->id,
                'quantity' => 1
            ]);
        }

        $this->dispatch('item-quantity-changed');
    }

    public function add()
    {
        $this->addedItem->quantity++;
        $this->addedItem->save();

        $this->dispatch('item-quantity-changed');
    }
    public function remove()
    {
        $this->addedItem->quantity--;
        if ($this->addedItem->quantity === 0) {
            $this->addedItem->delete();
            $this->addedItem = null;
        } else {
            $this->addedItem->save();
        }

        $this->dispatch('item-quantity-changed');
    }
}
