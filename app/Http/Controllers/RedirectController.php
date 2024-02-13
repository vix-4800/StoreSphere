<?php

namespace App\Http\Controllers;

class RedirectController extends Controller
{
    /**
     * Display the main index page
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('pages.index');
    }

    /**
     * Display the shopping cart page
     */
    public function cart(): \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    {
        return auth()->check() ?
            view('pages.cart') :
            redirect()->route('login');
    }
}
