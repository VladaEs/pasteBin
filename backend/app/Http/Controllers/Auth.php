<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    public function login(Request $request){


    }
    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'email'=>['required', 'max:255', "string"],
            'password'=>['required', 'max:255', "string"],
            'username'=>['required', 'max:255', "string"],
        ]);

        dd($validator);

    }
}
