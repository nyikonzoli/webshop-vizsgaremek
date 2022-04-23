<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(array_key_exists('email', $request->all()) && array_key_exists('token', $request->all())){
            $user = User::where('email', '=', $request["email"])->first();
            if(!is_null($user) && !is_null($user->admin) && $user->admin->token == $request["token"]){
                return $next($request);
            }
        }
        return abort(403, 'Unauthorized action.');
    }
}
