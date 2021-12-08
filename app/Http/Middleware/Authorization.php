<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Customers;

class Authorization
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
        $token      = $request->header('token');
        $customer   = Customers::where('token', $token)->first();

        if ($customer == null || $token == '') {
            // stop proses dan kirimkan response invalid token
            return response()->json([
                    'status'    => 'Invalid',
                    'data'      => null,
                    'error'     => ['Token Invalid, Unauthorized!']
                ], 401
            );
        }

        // simpan data customer
        $request->setUserResolver(function() use($customer){
            return $customer;
        });

        return $next($request); //lanjutkan proses berikutnya
    }
}
