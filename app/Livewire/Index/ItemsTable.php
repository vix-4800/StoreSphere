<?php

namespace App\Livewire\Index;

use App\Models\CartItem;
use App\Models\Item;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ItemsTable extends Component
{
    use WithPagination;

    /**
     * User items added to the cart
     */
    public Collection|array $userItems;

    /**
     * Pagination theme
     */
    protected string $paginationTheme = 'bootstrap';

    /**
     * Items per page
     */
    protected int $perPage = 12;

    /**
     * Mount function
     *
     * @return void
     */
    #[On('item-quantity-change')]
    public function render(): \Illuminate\Contracts\View\View
    {
        $this->userItems = auth()->check() ?
            auth()->user()->cartItems->pluck('item_id') :
            collect();

        return view('livewire.index.items-table', [
            'items' => Item::paginate($this->perPage),
        ]);
    }

    /**
     * Add a new item to the cart or increase the quantity
     *
     * @param  int  $itemId  The item ID
     */
    public function add(int $itemId): void
    {
        $item = CartItem::firstWhere('item_id', $itemId);

        if ($item) {
            $item->quantity++;
            $item->save();
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'item_id' => $itemId,
                'quantity' => 1,
            ]);
        }

        $this->dispatch('item-quantity-change');
    }

    /**
     * Remove an item from the cart or decrease the quantity
     *
     * @param  int  $itemId  The item ID
     */
    public function remove(int $itemId): void
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
