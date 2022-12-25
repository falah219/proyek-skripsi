<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $customer = User::where('roles', 'USER')->count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();

        return view('pages.admin.dashboard', [
            "title" => "dashboardAdmin",
            "customer" => $customer,
            "revenue" => $revenue,
            "transaction" => $transaction
        ]);
    }
}
// where('transaction_status', 'SUCCESS')->