<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/login');
            }
        } else {
            $admin = \DB::table('admins')
            ->join('users', 'users.id', '=', 'admins.userid')
            ->select('admins.*')
            ->where(['userid' => Auth::user()->id])
            ->distinct()
            ->get();
            if ($admin){
                return $next($request);
            } else {
                return redirect('/');
            }
        }
    }
}
