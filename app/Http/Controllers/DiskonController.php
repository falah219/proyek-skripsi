<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiskonController extends Controller
{
    public function index()
    {
        return view('pages.diskon');
    }
}
