<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculateTaxMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $latestOrder = $user ? $user->orders()->latest()->first() : null;

        if ($latestOrder) {
            $gstRate = $latestOrder->province->gst_rate;
            $pstRate = $latestOrder->province->pst_rate;

            $gstAmount = $latestOrder->total * ($gstRate / 100);
            $pstAmount = $latestOrder->total * ($pstRate / 100);

            $request->merge(['gst_amount' => $gstAmount, 'pst_amount' => $pstAmount]);
        }

        return $next($request);
    }
}
