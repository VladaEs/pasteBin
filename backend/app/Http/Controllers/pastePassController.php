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

        $paste_settings = pasteSetting::where('paste_id', $id)->first();
        if (Hash::check($request->input('password'), $paste_settings['password'])) {
            session(["paste_access_".$id =>true ]);
            return redirect()->route("viewPaste", ['id' => $id]);
        } else {
            return redirect()->back()->withErrors(["password" => "Incorrect password"]);
        }



        return 1;
    }
}
