<?php

namespace App\Http\Controllers;

class RedirectController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function cart()
    {
        return auth()->check() ?
            view('pages.cart') :
            redirect()->route('login');
    }
}
