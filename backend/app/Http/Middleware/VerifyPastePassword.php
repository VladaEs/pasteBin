<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class VerifyPastePassword
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


        if($request->session()->get('paste_access_'.$id) == null || $request->session()->get('paste_access_'.$id) != true ){
            return redirect()->route('passwordPage', ['id'=> $id]);
        }
        return $next($request);
    }
}
