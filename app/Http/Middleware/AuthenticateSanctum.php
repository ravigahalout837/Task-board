<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthenticateSanctum
{
    public function handle($request, Closure $next)
    {
        $token = Session::get('userToken');
        
        if (!$token) {
            
            $Return= response()->json(['message' => 'Unauthorized'], 401);
          
        }

        $request->headers->set('Authorization', 'Bearer ' . $token);

        return $next($request);
    }
}
