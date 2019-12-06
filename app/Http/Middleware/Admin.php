<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Admin
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
        if (!$request->user()->isAdmin()) {
            // This user is not a paying customer...
            Session::flash('message', 'You Are Not Authorized');
            Session::flash('message-type', 'error');
            return redirect()->back();
        }
        return $next($request);
    }
}
