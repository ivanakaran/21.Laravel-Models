<?php

namespace App\Http\Controllers;

use App\Models\Card;

class MainController extends Controller
{

    public function index()
    {
        $cards = Card::all();
        return view('index', compact('cards'));
    }

}