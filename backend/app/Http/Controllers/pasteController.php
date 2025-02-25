<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use App\Models\PasteExpiration;
use App\Models\pasteSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
class pasteController extends Controller
{


    public function __invoke($pasteId){

        $paste = $this->changePasteExpiration($pasteId);
        $pasteSettings = PasteSetting::where('paste_id', $pasteId)->first();
        $disk = $pasteSettings['paste_privacy']== 2? 'private': 'public';
        if (!$paste || !$pasteSettings) {
            return response()->view("file not found");
        }
        $pasteContent = '';
        if (Storage::disk('local')->exists($paste['filename']) || Storage::disk('public')->exists($paste['filename'])) {
            $pasteContent = Storage::disk($disk)->get($paste['filename']);


        } else {
            return response()->view("file not found");
        }
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Paste Expiration handling -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=


        return view('paste', ["pasteContent"=> $pasteContent]);
    }
    public function changePasteExpiration($pasteId){
        $paste = Paste::where("id", $pasteId)->first();
        $pasteSettings =PasteSetting::where('paste_id', $pasteId)->first();
        $expirationTime = PasteExpiration::where('id',$pasteSettings['paste_expiration'])->first();

        if ($paste && $paste->created_at->addSeconds($expirationTime['time_equivalent'])->isPast()
                                && $expirationTime['expiration_name'] != 'Never') {
            $paste->delete();
        }


        return $paste;
    }


}
