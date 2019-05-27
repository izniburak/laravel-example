<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;

class HomeController extends Controller
{
    public function home()
    {
        $exchangeData = Exchange::orderBy('id', 'desc')->first();
        return view('home', compact('exchangeData'));
    }
}
