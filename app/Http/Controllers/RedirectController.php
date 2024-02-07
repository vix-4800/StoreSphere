<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('pages.index', compact('items'));
    }
}
