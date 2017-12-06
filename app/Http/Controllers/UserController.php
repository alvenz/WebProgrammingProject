<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function doRegister(Request $req)
    {
        /*$rules = [
            'txtEmail' => 'required | email | unique:users',
            'txtPassword' => 'required | min:5 | alpha_num',
            'txtConfPassword' => 'required',
            'txtDoB' => 'required',
            'txtFullname => 'required | min:5'
        ];

        $messages = [
            'required' => 'The :attribute mustn\'t be empty',
        ];
        */

        //$errors = Validator::make($req->all(), $rules, $messages);

        //if($errors->fails()){
            //return redirect('/')->withErrors($errors);
        //}else
        //{
        $user = new User();
        $user->name = $req->txtFullname;
        $user->email = $req->txtEmail;
        $user->password = Hash::make($req->txtPassword);
        $user->dob = $req->txtDoB;
        $image = $req['fileUpload'];
        $fileName = $image->getClientOriginalName();
        $image->move('uploads', $fileName);
        $user->picture = $fileName;
        $user->role = 'Member';
        $user->save();
        return redirect('/');
        //}
    }

    public function doLogin(Request $req)
    {
        //Validation kurang appropriate with the data in the database
        $rules = [
            'txtEmail' => 'required',
            'txtPassword' => 'required'
        ];

        $errors = Validator::make($req->all(), $rules);

        if(Auth::attempt(['email'=>$req->txtEmail, 'password'=>$req->txtPassword]))
        {
            if($req->has('rememberMe'))
            {
                $response = new Response(redirect('/'));
                $response->withCookie('rememberMeCookiesEmail', $req->txtEmail, 30);
                $response->withCookie('rememberMeCookiesPassword', $req->txtPassword, 30);
                return $response;
            }
            else
            {
                return redirect('/');
            }
        }
        else
        {
            return redirect('/login')->withErrors($errors);
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function viewAllUser()
    {
        $users = User::get();
        return view('manageUsers', ['users' => $users]);
    }

    public function viewUpdateUserData($id)
    {
        $users = User::find($id);
        return view('updateUserView', ['data'=>$users]);
    }

    public function doUpdateUser(Request $req)
    {
        //Validation
        $dt = new Carbon\Carbon();
        $before=$dt->subYears(12)->format('m/d/Y');
        $this->validate($req,[
            'txtFullname'=>'required|min:5',
            'txtEmail'=>'required|email|unique:users',
            'txtPassword'=>'required|alpha_num|min:5',
            'txtConfPassword'=>'required|same:txtPassword',
            'txtDoB'=>'before:'.$before,
            'fileUpload'=>'required|image'
        ]);
        $id = $req->txtOldUserId;
        $users = User::find($id);
        $users->name = $req->txtFullname;
        $users->email = $req->txtEmail;
        $users->password = Hash::make($req->txtConfPassword);
        $users->dob = $req->txtDoB;
        $image = $req['fileUpload'];
        $fileName = $image->getClientOriginalName();
        $users->picture = $fileName;
        $users->update();
        return redirect('/');
    }

    public function doInsertUser(Request $req)
    {
        //Validation
        $dt = new Carbon\Carbon();
        $before=$dt->subYears(12)->format('m/d/Y');
        $this->validate($req,[
            'txtFullname'=>'required|min:5',
            'txtEmail'=>'required|email|unique:users',
            'txtPassword'=>'required|alpha_num|min:5',
            'txtConfPassword'=>'required|same:txtPassword',
            'txtDoB'=>'before:'.$before,
            'fileUpload'=>'required|image'
        ]);
        $users = new User();
        $users->name = $req->txtFullname;
        $users->email = $req->txtEmail;
        $users->password = Hash::make($req->txtConfPassword);
        $users->dob = $req->txtDoB;
        $image = $req['fileUpload'];
        $fileName = $image->getClientOriginalName();
        $image->move('uploads', $fileName);
        $users->picture = $fileName;
        $users->role = 'Member';
        $users->save();
        return redirect('/');
    }

    public function doDeleteUser($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/');
    }

    public function doEditProfile(Request $req)
    {
        //Validation
        $dt = new Carbon\Carbon();
        $before=$dt->subYears(12)->format('m/d/Y');
        $this->validate($req,[
            'txtFullname'=>'required|min:5',
            'txtDoB'=>'before:'.$before,
            'fileUpload'=>'required|image'
        ]);
        $users = User::find(Auth::user()->id);
        $users->name = $req->txtFullname;
        $users->dob = $req->txtDoB;
        $image = $req['fileUpload'];
        $fileName = $image->getClientOriginalName();
        $users->picture = $fileName;
        $users->update();
        return redirect('/');
    }
}
