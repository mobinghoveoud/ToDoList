<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TaskPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {
        if ( $request->task and $request->task->user_id != auth()->user()->id ) {
            abort( 403 );
        }

        return $next( $request );
    }
}
