<?php
namespace App\Views\Composers;
use Illuminate\Support\Facades\Auth;
use App\Models\Paste;
use Carbon\Carbon;

use illuminate\View\View;
    class PublicPastesComposer {
        public function __construct() {
            }
    // The compose function here handles the logic of binding data to the view
        public function compose(View $view) {
            $publicPastes = Paste::publicPastes()->get();
            for($i = 0; $i<count($publicPastes);$i++){
                $publicPastes[$i]['timeDifference']=  Carbon::parse( $publicPastes[$i]->created_at)->diffForHumans();
            }
            $view->with('publicPastes', $publicPastes);
    }
    }