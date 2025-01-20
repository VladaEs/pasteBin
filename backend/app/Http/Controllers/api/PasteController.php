<?php

namespace App\Http\Controllers\api;
use App\Models\Paste;
use App\Models\pasteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PasteResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class PasteController extends Controller
{
    public function index(){
        $paste = Paste::get();
        if($paste->count()> 0){
            return PasteResource::collection($paste);
        }
         return response()->json(["message"=> "no records available"], 200);


    }
    public function store(Request $request){
// need to finish validation

        $validator = Validator::make($request->all(), [
            "PasteName" =>'required|string|max:255',
            "TextAreaValue" =>"required|string",
            "Category" =>"integer",
        ]);
        if($validator->fails()){
            return response()->json(["message"=>"error"], 424);
        }
        $request->validate([
            "PasteName" =>'required|string|max:255',
            "TextAreaValue" =>"required|string",
        ]);

        // i will need this bit, will comment until i create a pasteSettings
         $paste = Paste::create([
            "filename" => $request['PasteName'],
            "author_id" => $request["user_id"],
        ]);

        $paste_setting = pasteSetting::create([
            "paste_id" =>$paste["id"],
            "category_id" => $request["Category"],
            "password"=>$request["password"],
            "paste_expiration"=> $request['PasteExpiration'],
            "paste_privacy"=>$request['Privacy'],


        ]);
        Storage::disk('local')->put('example.txt', "content test");
        return response()->json(["message"=>"Paste was created succesfully"], 200);
    }
    public function show(){


    }
    public function update(){


    }
    public function destroy(){


    }
}
