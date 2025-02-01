<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
            Storage::disk('public')->put($fileName,$pasteContent);
        }

        return 1;
    }


}
