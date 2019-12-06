<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Subscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!$request->user()->onTrial() && !$request->user()->subscribed('main')) {
            // This user is not a paying customer...
            Session::flash('message', 'Please buy a plan to continue');
            Session::flash('message-type', 'info');
            return redirect('billing');
        }
        return $next($request);
    }
}
