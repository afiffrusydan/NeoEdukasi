<?php
  
namespace App\Http\Middleware;

use App\Models\admin\TutoredStudents;
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
        $checkData = TutoredStudents::where('tentor_id','=',Auth::user()->id)->where('status','=','100')->get();
        if ($checkData->isEmpty() AND Auth::user()->account_status != 100){
            return redirect()->route('tentor.dashboard')
                    ->with('errormsg', 'Anda tidak dapat mengakses halaman ini. Silahkan hubungi admin untuk informasi');
        }
        return $next($request);
    }
}
