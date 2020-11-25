<?php

namespace app\admin\middleware;

use app\Request;

/**
 * 后台登陆验证中间件
 * Class AdminAuthTokenMiddleware
 * @package app\admin\middleware
 */
class AdminAuthTokenMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        $authInfo = null;
        $token = $request->header();

        //check_role

        return $next($request);
    }
}
