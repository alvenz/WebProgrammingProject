<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        $user->password = $req->txtPassword;
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
}
