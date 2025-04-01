<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ScheduleDeletePasteController;


class PasteExpiredMiddleware
{
    protected $scheduleDeletePasteController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


     public function __construct(ScheduleDeletePasteController $scheduleDeletePasteController)
     {
        $this->scheduleDeletePasteController = $scheduleDeletePasteController;
     }
    public function handle(Request $request, Closure $next): Response{

        $id = $request->route('id');
        Log::info('PasteExpired?:', [
            'id' => $id,
        ]);
        if( $this->scheduleDeletePasteController->pasteExpired($id)){

            $this->scheduleDeletePasteController->deleteSinglePaste($id);
            return redirect(route('home'))->withErrors(["expired" => "pasteExpired"]);
        }


        return $next($request);
    }
}
