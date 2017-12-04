<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function viewLowestPriceGame()
    {
        $products = Product::orderBy('price','ASC')->get();
        return view('home', ['products' => $products]);
    }

    public function viewProduct(Request $req)
    {
        $search = "";
        if(isset($req->doSearching))
        {
            $search = $req->doSearching;
        }

        $products = Product::Where('name', 'like', '%'.$search.'%')->paginate(6);
        return view('store', ['products' => $products, 'search'=>$search]);
    }

    public function viewAllGames()
    {
        $products = Product::get();
        return view('manageGames', ['products' => $products] );
    }

    public function viewUpdateData($id)
    {
        $products = Product::find($id);
        return view('updateGameForm', ['data'=>$products]);
    }

    public function doUpdateGame(Request $req)
    {
        //Validation

        $id = $req->txtOldGameId;
        $products = Product::find($id);
        $products->name = $req->txtGameName;
        $products->price = $req->txtPrice;
        $products->release_date = $req->txtRd;
        $products->genre = $req->txtGenre;
        $image = $req['fileUpload'];
        $fileName = $image->getClientOriginalName();
        $products->picture = $fileName;
        $products->update();
        return redirect('/');
    }

    public function doInsertGame(Request $req)
    {
        //Validation

        $products = new Product();
        $products->name = $req->txtGameName;
        $products->price = $req->txtPrice;
        $products->release_date = $req->txtRd;
        $products->genre = $req->txtGenre;
        $image = $req['fileUpload'];
        $fileName = $image->getClientOriginalName();
        $image->move('uploads', $fileName);
        $products->picture = $fileName;
        $products->save();
        return redirect('/');
    }

    public function doDeleteGame($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('/');
    }
}
