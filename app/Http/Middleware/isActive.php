<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class IsActive
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
        if ((Auth::user()->account_status) == -10 OR (Auth::user()->account_status) == 0 OR (Auth::user()->account_status) == -5) {
            
            return redirect()->route('tentor.dashboard')
                    ->with('errormsg', 'You need to active your account first. Please verify your account!.');
        }

        return $next($request);
    }
}