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


    public function __invoke($pasteId)
    {
        $paste = $this->changePasteExpiration($pasteId);
        $pasteSettings = PasteSetting::where('paste_id', $pasteId)->first();
        if (!$paste || !$pasteSettings) {
            return response()->view("file not found");
        }
        $filename = $paste['filename'];
        $pasteContent = null;
        if (Storage::disk('local')->exists($filename)) {
            $pasteContent = Storage::disk('local')->get($filename);
        } elseif (Storage::disk('public')->exists($filename)) {
            $pasteContent = Storage::disk('public')->get($filename);
        } else {
            return response()->view("file not found");
        }

        return view('paste', ["pasteContent" => $pasteContent]);
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
