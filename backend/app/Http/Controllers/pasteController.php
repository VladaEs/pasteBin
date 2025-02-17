<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use App\Models\pasteSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class pasteController extends Controller
{
    public function __invoke($pasteId){

        $paste = Paste::where("id", $pasteId)->first();
        $pasteSettings = pasteSetting::where('paste_id', $pasteId)->first();
        $pasteContent ='';
        $disk = '';
        if($pasteSettings['paste_privacy']==2){
            $disk = 'local';
        }else{
            $disk = 'public';
        }

        if($pasteSettings['paste_privacy']==2 && session('paste_access') != $pasteId){
            return redirect()->route('passwordPage',['id'=> $pasteId]);
        }



        if(Storage::disk('local')->exists($paste['filename'])){
            $pasteContent =Storage::disk($disk)->get($paste['filename']);
        }







        return view('paste', ["pasteContent"=> $paste["id"]]);

    }
}
