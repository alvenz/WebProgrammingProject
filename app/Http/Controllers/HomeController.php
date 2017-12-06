<?php

namespace App\Http\Controllers;

use App\Genre;
use App\TransactionHistory;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    /*
     public function viewHomePage()
    {
        return view('home');
    }
    public function viewUpdateGamePage()
    {
        return view('updateGameForm');
    }

    public function viewUpdateUserPage()
    {
        return view('updateUserView');
    }

    public function viewStorePage()
    {
        return view('store');
    }

    public function viewUpdateGenrePage()
    {
        return view('updateGenreForm');
    }

    public function viewMyGames()
    {
        return view('mygames');
    }
    */

    public function viewLoginPage()
    {
        return view('login');
    }

    public function viewRegisterPage()
    {
        return view('register');
    }

    public function viewInsertGamePage()
    {
        $genres = Genre::get();
        return view('insertGameForm', ['genres'=>$genres]);
    }

    public function viewInsertUserPage()
    {
        return view('insertUserView');
    }

    public function viewInsertGenrePage()
    {
        return view('insertGenreForm');
    }

    public function viewProfilePage()
    {
        return view('profile');
    }
}
