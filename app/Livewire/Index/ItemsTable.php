<?php

namespace App\Livewire\Index;

use App\Models\Item;
use Livewire\Component;

class ItemsTable extends Component
{
    public $userItems;

    public function mount()
    {
        $this->userItems = auth()->check() ? auth()->user()->cartItems->pluck('item_id') : collect();
    }

    public function render()
    {
        return view('livewire.index.items-table', [
            'items' => Item::paginate(12)
        ]);
    }

    public function updatedPage($page)
    {
        $this->render();
    }
}
