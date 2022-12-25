<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardProfilesController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.dashboardprofile', [
            "user" => $user
        ]);
    }

    public function update(Request $request,$redirect)
    {
        $item = Auth::user();
        $data = $request->all();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
