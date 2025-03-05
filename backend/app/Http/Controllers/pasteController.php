<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use App\Models\PasteView;
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
        // if we return content we need to add  +1 to view
        $pasteViews= PasteView::where('paste_id', $paste['id'])->first();
        $this->updateViews($pasteViews);
        return view('paste', ["pasteContent" => $pasteContent, "pasteViews"=> $pasteViews['views_amount']]);
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

    public function updateViews(PasteView $pasteView){
        if(session()->get('paste_viewed_'. $pasteView['paste_id'])!= null || session()->get('paste_viewed_'. $pasteView['paste_id']) == true){
            return 0;
        }

        $pasteView['views_amount'] =$pasteView['views_amount'] + 1;
        session()->put('paste_viewed_'. $pasteView['paste_id'], true);
        $pasteView->save();

    }



}
