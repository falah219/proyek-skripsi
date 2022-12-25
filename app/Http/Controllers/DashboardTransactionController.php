<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $buyTransaction = TransactionDetail::with(['transaction','product'])
                        ->whereHas('transaction', function($transaction){
                            $transaction->where('users_id', Auth::user()->id);
                        })->get();
        return view('pages.dashboardtransaction', [
            'buyTransaction' => $buyTransaction
        ]);
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->findOrFail($id);

        return view('pages.dashboardtransactiondetail', [
            "transaction" => $transaction
        ]);
    }
}
