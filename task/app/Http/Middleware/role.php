<?php

namespace App\Http\Middleware;

use Closure;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        echo 'vai tro: ' . $role;
        echo '<br>Thực hiện khi đang xử lý HTTP response';
        return $next($request);
    }

    public function terminate($request, $response)
    {
        echo '<br>3. Terminable Middleware';
        echo '<br>Thực hiện sau khi HTTP response gửi đến trình duyệt';
    }
}
