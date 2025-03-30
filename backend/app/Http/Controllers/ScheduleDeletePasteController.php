<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleDeletePasteController extends Controller
{
    //

    public function __invoke(){
        $pastes = DB::table('pastes')
        ->join('paste_settings', 'pastes.id', '=', 'paste_settings.paste_id')
        ->join('paste_expiration', 'paste_settings.paste_expiration', '=', 'paste_expiration.id')
        ->where('paste_expiration.id', '!=', 1)
        ->select('pastes.id' ,'pastes.created_at', 'paste_expiration.time_equivalent') // Select everything
        ->get();


        $idDelete= [];
        for($i = 0; $i< count($pastes); $i++){

            $now = now()->timestamp;
            $timeSum = Carbon::parse($pastes[$i]->created_at) // Use -> instead of []
            ->addSeconds($pastes[$i]->time_equivalent)
            ->timestamp;

            //dd($timeSum, $now);
            if($timeSum<= $now){
                $idDelete []= $pastes[$i]->id;
            }
        }
        dd($idDelete);


    }
}
