<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class IsHired
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
        if ((Auth::user()->account_status) != 100) {
            
            return redirect()->route('tentor.dashboard')
                    ->with('errormsg', 'You cant access that menu. Please contact admin for information');
        }

        return $next($request);
    }
}