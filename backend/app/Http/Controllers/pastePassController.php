<?php

namespace App\Http\Controllers;

use App\Models\pasteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class pastePassController extends Controller
{
    public function index($pasteId){

        return view('passwordPage', compact('pasteId'));

    }
    public function checkPassword($id, Request $request){
        $passHashed= Hash::make($request->input('password'));

        $paste_settings = pasteSetting::where('paste_id', $id)->first();
        if($paste_settings['password'] == $passHashed){
            session(["paste_access"=>$id]);
            return redirect()->route("viewPaste", ['id'=> $id]);

//            return redirect()->route();
        }else{
            return redirect()->back()->withErrors(["password" =>"Incorrect password"]);
        }








        return 1;
    }
}
