<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, int $itemId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return 'hello';
    }
}
