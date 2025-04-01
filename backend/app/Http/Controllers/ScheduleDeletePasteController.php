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
            if ($timeSum <= $now) {
                $idDelete[] = $pastes[$i]->id;
            }
        }
        if (!empty($idDelete)) {
            $test = DB::table('pastes')->whereIn('id', $idDelete)->update(['deleted_at'=> Carbon::now()]);
            dd('deleted' , $idDelete); // Debug the result
        } else {
            dd('No IDs to delete');
        }
    }

    public function deleteSinglePaste(int $id): int{

        if(!Paste::where('id', $id)->exists()){
            return 0;
        }
        DB::table('pastes')->where('id', $id)->update(['deleted_at'=> Carbon::now()]);
        return $id;
    }


    public function pasteExpired(int $id): bool{
        $pasteData = DB::table('pastes')
        ->join('paste_settings', 'pastes.id', '=', 'paste_settings.paste_id')
        ->join('paste_expiration', 'paste_settings.paste_expiration', '=', 'paste_expiration.id')
        ->where('pastes.id', $id)
        //->where('paste_expiration.id', '!=', 1)
        ->select('pastes.id', 'pastes.created_at', 'paste_expiration.time_equivalent')
        ->first();

        if($pasteData->time_equivalent == 0) return false;
        if($pasteData->time_equivalent == 1) return false;
        $now = now()->timestamp;
            $timeSum = Carbon::parse($pasteData->created_at) // Use -> instead of []
            ->addSeconds($pasteData->time_equivalent)
            ->timestamp;

            //dd($timeSum, $now);
            if ($timeSum <= $now) {
                return true;
            }
        return false;
    }


}
