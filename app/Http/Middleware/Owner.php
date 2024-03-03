<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request);
        $note = $request->route('note');
        if($note->user_id == Auth::user()->id){
            return $next($request);
        }else{
            abort('404');
        }
    }
}
