<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Http\Response;

class IdInURLIsDefined
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
        // dd($request->id);
        // recup dans l'url l'id => pour vérifier si l'id existe dans la db
        $user_id = Users::find($request->id);
        if($user_id !== null)
        {
            return $next($request);
        }
        else
        {
            return Response("User Not Found", 404);
        }
    }
}
