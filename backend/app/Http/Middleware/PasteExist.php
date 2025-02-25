<?php

namespace App\Http\Middleware;

use App\Models\Paste;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PasteExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        Log::info('Session value:', [
            'id' => $id,
            'value' => $request->session()->get('paste_access_'.$id)
        ]);
        $paste=  Paste::where('id', $id)->first();
        if($paste == null){
            abort(404);
        }
        else{
            return $next($request);
        }

    }
}
