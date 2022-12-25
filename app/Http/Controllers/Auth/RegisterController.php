<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.detail', [
            "title" => "Detail"
        ]);
    }

    public function success()
    {
        return view('auth.success', [
            "title" => "registersuccess"
        ]);
    }
}
