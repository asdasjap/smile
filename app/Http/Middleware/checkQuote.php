<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use App\Models\Quote;

class checkQuote
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
        
        if(auth()->user()->score !== null) {
            if(Cache::has(auth()->user()->email)) {
                $quoteOfTheDay = Cache::get(auth()->user()->email);
            } else {
                $quoteOfTheDay = Quote::inRandomOrder()->first();
                Cache::put(auth()->user()->email, $quoteOfTheDay, now()->addDay());
            }
            session([auth()->user()->email => $quoteOfTheDay]);
        } 
        return $next($request);
    }
}
