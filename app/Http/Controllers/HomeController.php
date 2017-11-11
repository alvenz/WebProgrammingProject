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
}
