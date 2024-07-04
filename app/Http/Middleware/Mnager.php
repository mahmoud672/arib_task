<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Mnager
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

        $type = Auth::user()->type;
        if (in_array($type,[UserType::$MANAGER,UserType::$ADMIN]))
        {
            return $next($request);
        }
        else
        {
            return redirect()->back();
        }
    }
}
