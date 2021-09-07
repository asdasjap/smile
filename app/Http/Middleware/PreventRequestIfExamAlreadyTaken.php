<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventRequestIfExamAlreadyTaken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!(auth()->user()->score === null)) {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
