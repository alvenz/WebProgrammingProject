<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\TransactionHistory;
use Illuminate\Http\Request;

use App\Http\Requests;

class TransactionController extends Controller
{
    public function viewUserTransaction()
    {
        $transactions = TransactionHistory::get();
        return view('manageUserTransaction', ['transactions' => $transactions] );
    }

    public function doDeleteTransaction($id)
    {
        $transactions = TransactionHistory::find($id);
        $transactions->delete();
        return redirect('/');
    }

    public function doDeleteCart($id)
    {
        $carts = CartDetail::find($id);
        $carts->delete();
        return redirect('/');
    }
}
