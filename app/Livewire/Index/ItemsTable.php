<?php

namespace App\Livewire\Index;

use App\Models\CartItem;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ItemsTable extends Component
{
    use WithPagination;

    public $userItems;

    protected $paginationTheme = 'bootstrap';

    protected $perPage = 12;

    #[On('item-quantity-change')]
    public function render()
    {
        $this->userItems = auth()->check() ?
            auth()->user()->cartItems->pluck('item_id') :
            collect();

        return view('livewire.index.items-table', [
            'items' => Item::paginate($this->perPage),
        ]);
    }

    public function add(int $itemId)
    {
        $item = CartItem::firstWhere('item_id', $itemId);

        if ($item) {
            $item->quantity++;
            $item->save();
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'item_id' => $itemId,
                'quantity' => 1
            ]);
        }

        $this->dispatch('item-quantity-change');
    }

    public function remove(int $itemId)
    {
        $item = CartItem::firstWhere('item_id', $itemId);

        $item->quantity--;
        if ($item->quantity == 0) {
            $item->delete();
        } else {
            $item->save();
        }

        $this->dispatch('item-quantity-change');
    }
}
