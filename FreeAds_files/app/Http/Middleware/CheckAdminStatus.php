<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class CheckAdminStatus
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
        $user_admin_status = Users::find($request->admin_status);
        if($user_admin_status == NULL)
        {
            return Response("User not found", 404);
        }
        else
        {
            if($user_admin_status->admin_status == "1")
            {
                return $next($request);
            }
            else
            {
                return Response("User does not have the required priviledges", 404);
            }
        }
        
        
        
    }
}
