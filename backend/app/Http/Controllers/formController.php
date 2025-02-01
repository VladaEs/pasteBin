<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Paste;
use Illuminate\Support\Str;
use App\Models\pasteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class formController extends Controller{

    public function index(){
        return "index";
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            "pasteName" =>'required|string|max:255',
            "pasteContent" =>"required|string",
            "Category" =>"integer",
        ]);
        if($validator->fails()){
            return view(route("home"));
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
