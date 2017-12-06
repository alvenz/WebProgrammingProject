<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\GamesLibrary;
use App\GamesLibraryDetail;
use App\Genre;
use App\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function viewLowestPriceGame()
    {
        $products = Product::orderBy('price','ASC')->get();
        return view('home', ['products' => $products]);
    }

    public function viewProduct(Request $req, $genre)
    {
        $search = "";
        if(isset($req->doSearching))
        {
            $search = $req->doSearching;
        }

        if($genre == 'default')
        {
            $arrayQuery = [['name', 'like', '%'.$search.'%']];
        }
        else
        {
            $genreType = $genre;
            $arrayQuery = [['name', 'like', '%'.$search.'%'],['genreTypeId', '=', $genreType]];
        }
        $genres = Genre::get();

        $products = Product::Where($arrayQuery)->paginate(6);
        return view('store', ['products' => $products, 'search'=>$search, 'genres'=>$genres]);
    }

    public function viewMyGames($id)
    {
        $query = DB::table('games_libraries')->select('gamesLibraryId')->where('userId', '=', $id)->get();
        $array = json_decode(json_encode($query), True);
        $index = $array[0];
        $gameslibraryid = $index['gamesLibraryId'];
        $mygames = GamesLibraryDetail::Where('gamesLibraryId', '=', $gameslibraryid)->paginate(6);

        return view('mygames', ['mygames' => $mygames]);
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
        $this->validate($req,[
            'txtGameName'=>'min:3',
            'txtGenre'=>'required',
            'txtRd'=>'required|date',
            'txtPrice'=>'required|numeric|min:1',
            'fileUpload'=>'required|image'
        ]);
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
        $this->validate($req,[
            'txtGameName'=>'min:3',
            'txtGenre'=>'required',
            'txtRd'=>'required|date',
            'txtPrice'=>'required|numeric|min:1',
            'fileUpload'=>'required|image'
        ]);
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

    public function viewAllGenres()
    {
        $genres = Genre::get();
        return view('manageGenres', ['genres' => $genres] );
    }

    public function viewUpdateGenreData($id)
    {
        $products = Product::find($id);
        return view('updateGenreForm', ['data'=>$products]);
    }

    public function doUpdateGenre(Request $req)
    {
        //Validation
        $this->validate($req,[
            'txtGenreName'=>'min:3'
        ]);
        $id = $req->txtOldGenreId;
        $genres = Genre::find($id);
        $genres->genreTypeName = $req->txtGenreName;
        $genres->update();
        return redirect('/');
    }

    public function doInsertGenre(Request $req)
    {
        //Validation
        $this->validate($req,[
           'txtGenreName'=>'min:3'
        ]);
        $genres = new Genre();
        $genres->genreTypeName = $req->txtGenreName;
        $genres->save();
        return redirect('/');
    }

    public function doDeleteGenre($id)
    {
        $genres = Genre::find($id);
        $genres->delete();
        return redirect('/');
    }

    public function showGameDetail($id)
    {
        $games = Product::Where('id', '=', $id)->get();
        return view('gameDetail', ['games' => $games]);
    }
}
