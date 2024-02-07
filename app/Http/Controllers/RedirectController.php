<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('pages.index', compact('items'));
    }

    public function cart()
    {
        return auth()->check() ? view('pages.cart') : redirect()->route('login');
    }
}
