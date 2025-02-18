<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Paste;
use Illuminate\Support\Str;
use App\Models\pasteSetting;
use Illuminate\Http\Request;
use App\Models\Paste_Category;
use App\Models\Paste_Tag;

use App\Models\PasteExpiration;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class formController extends Controller{

    public function index(){
        $categories = Paste_Category::all();
        $pasteExpiration = PasteExpiration::all();
        $pastePrivacy = [
            ["id"=>1, "privacy"=>"public"],
            ["id"=>2, "privacy"=>"private"],

        ];
        return view("home" ,["categories"=> $categories, "expirationTime"=> $pasteExpiration, "privacy"=>$pastePrivacy]);
    }

    public function store(Request $request){




        $validator = Validator::make($request->all(), [
            "pasteContent" =>"required|string",
            "Category" =>['required',"integer"],
            "pasteTags"=>['string', 'max:50'],
            'expiration'=>['required', 'integer'],
            'password'=>["nullable",'string', 'max:50'],
            "pasteName" =>'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        };




        if($pasteContent = $request->input("pasteContent") && $pasteName = $request->input("pasteName")){

            // check whether this categopry exists:
            if(! Paste_Category::where('id', $request->input("Category"))->exists()){
                return redirect()->back()
                ->withInput()
                ->withErrors(["Category" => "Selected category doesnt exist"]);
            }



            $uuid = Str::uuid()->toString();
            $fileName= $pasteName ."_" .$uuid;
            $location = '';
            if($password = $request->input("password")){
                Storage::disk('local')->put($fileName,$pasteContent);
                $location= "local";
            }else{
                Storage::disk('public')->put($fileName,$pasteContent);
                $location= "public";
            }


            /*
            order to create a new paste:
            1. tags
            2. paste
            3. paste settings
            4. paste tags
            */
            //-=-=-=-= add only new tags, which do not exist in a table -=-=-=-=
            $tagsIds= [];
            if($tags = $request->input("pasteTags")){
                $tagsArr = explode(",", $tags);
                if(count($tagsArr)>=1 ){
                    foreach($tagsArr as $tagName){
                        $tag = Tag::firstOrCreate(['tag'=> $tagName]);
                        $tagsIds[] = $tag['id'];
                    }
                }
            }
            //-=-=-=-= Paste creation to have an paste ID in advance-=-=-=-=
            $paste = Paste::create([
                "filename"=> $fileName,
            ]);


            //-=-=-=-= paste_tags table-=-=-=-=
            $insertTags = [];
            foreach($tagsIds as $tagId){
                $insertTags[] = [
                    "paste_id"=>$paste['id'],
                    "tag_id"=>$tagId,
                ];
            }

            Paste_Tag::insert($insertTags);
            $hashedPassword = Hash::make($request->input('password'));
            pasteSetting::create([
                "paste_id"=>$paste['id'],
                "category_id"=>$request->input("Category"),
                "paste_expiration"=>$request->input("expiration"),
                "paste_privacy"=> $request->input('privacy'),
                'password'=>$hashedPassword,
            ]);
        }

        return redirect()->route('viewPaste', $paste['id']);
    }

    public function checkTags(){

    }
}
