<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Paste;
use Illuminate\Support\Str;
use App\Models\pasteSetting;
use Illuminate\Http\Request;
use App\Models\Paste_Category;

use App\Models\PasteExpiration;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class formController extends Controller{

    public function index(){
        $categories = Paste_Category::all();
        $pasteExpiration = PasteExpiration::all();
        $pastePrivacy = [
            "public", "private",
        ];
        return view("home" ,["categories"=> $categories, "expirationTime"=> $pasteExpiration, "privacy"=>$pastePrivacy]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "pasteContent" =>"required|string",
            "Category" =>"integer",
            "pasteTags"=>['string', 'max:50'],
            'expiration'=>['required', 'integer'],
            'expiration'=>['required', 'integer'],
            'password'=>['string', 'max:50'],
            "pasteName" =>'required|string|max:255',


        ]);
        if ($validator->fails()) {
            return redirect(route("home"))
                ->withErrors($validator)  // Pass the validator object
                ->withInput();            // Retain previous input
        }

        if($pasteContent = $request->input("pasteContent") && $pasteName = $request->input("pasteName")){
            $uuid = Str::uuid()->toString();
            $fileName= $pasteName ."_" .$uuid;
            if($password = $request->input("password")){
                Storage::disk('local')->put($fileName,$pasteContent);
            }else{
                Storage::disk('public')->put($fileName,$pasteContent);
            }



        }

        return 1;
    }


}
