<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use Auth;

class CheckSubscriptionStatus
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

        $subscription = DB::table('user_plan')
        ->where('status', 'active')
        ->where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('user_id', Auth::user()->invitation_id);
        })
        ->first();

    if (!$subscription || $subscription->status !== 'active') {
        return response()->json(['error' => 'Subscription inactive'], 403); // Or redirect to a route
    }
        return $next($request);
    }
}
