<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\TransactionHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function viewMyCart($id)
    {
        $query = DB::table('carts')->select('cartId')->where('userId', '=', $id)->get();
        $array = json_decode(json_encode($query), True);
        $index = $array[0];
        $cartId = $index['cartId'];
        $carts = CartDetail::Where('cartId', '=', $cartId)->get();
        return view('cart', ['carts' => $carts]);
    }

    public function doDeleteCart($id)
    {
        $carts = CartDetail::find($id);
        $carts->delete();
        return redirect('/');
    }

    public function doAddToCart($id)
    {
        $loggedId = Auth::user()->id;
        if($loggedId == 0)
        {
            return redirect('/');
        }
        $query = DB::table('carts')->select('cartId')->where('userId', '=', $loggedId)->get();
        $array = json_decode(json_encode($query), True);
        $index = $array[0];
        $cartId = $index['cartId'];
        if($cartId == 0)
        {
            $cart = new Cart();
            $cart->userId = $loggedId;
            $cart->save();
        }
        $cartDetail = CartDetail::Where('cartId', '=', $cartId)->get()->count();
        $dt = new Carbon();
        $checkProductId = CartDetail::where('productId', '=', $id)->get()->count();
        if($cartDetail == 0 || $checkProductId == 0)
        {
            $newCartDetail = new CartDetail();
            $newCartDetail->cartId = $cartId;
            $newCartDetail->productId = $id;
            $newCartDetail->purchaseDate = $dt;
            $newCartDetail->qty = 1;
            $newCartDetail->save();
            return redirect('/');
        }
        else
        {
            $query1 = DB::table('cart_details')->select('id')->where('productId', '=', $id)->get();
            $array1 = json_decode(json_encode($query1), True);
            $index1 = $array1[0];
            $getIdDetail = $index1['id'];
            $newCartDetail = CartDetail::find($getIdDetail);
            $newCartDetail->qty += 1;
            $newCartDetail->update();
            return redirect('/');
        }
    }

    public function doCheckOut($id)
    {
        $loggedId = Auth::user()->id;
        if($loggedId == 0)
        {
            return redirect('/');
        }
        $totalData = CartDetail::get();
        for($i = 0; $i < count($totalData); $i++)
        {
            $query1 = DB::table('cart_details')->select('id')->where('cartId', '=', $id)->get();
            $array1 = json_decode(json_encode($query1), True);
            $index1 = $array1[0];
            $getIdDetail[$i] = $index1['id'];
            $cartDetailId = CartDetail::find($getIdDetail[$i]);
            $cartDetailId->delete();
        }
        $newTransactionHistory = new TransactionHistory();
        $newTransactionHistory->userId = Auth::user()->id;
        $dt = new Carbon();
        $newTransactionHistory->transactionDate = $dt;
        $newTransactionHistory->save();
        return redirect('/store/default');
    }
}
