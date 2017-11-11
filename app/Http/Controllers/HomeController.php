<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function viewHomePage()
    {
        return view('home');
    }

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

    public function viewUpdateGamePage()
    {
        return view('updateGameForm');
    }

    public function viewInsertUserPage()
    {
        return view('insertUserView');
    }

    public function viewUpdateUserPage()
    {
        return view('updateUserView');
    }

    public function viewInsertGenrePage()
    {
        return view('insertGenreForm');
    }

    public function viewUpdateGenrePage()
    {
        return view('updateGenreForm');
    }
}
