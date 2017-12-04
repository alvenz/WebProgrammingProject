<?php

namespace App\Http\Controllers;

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
        return view('insertGameForm');
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

    public function viewMyGames()
    {
        return view('mygames');
    }
}
