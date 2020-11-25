<?php


namespace app\admin\middleware;

use app\Request;

/**
 * 权限规则验证
 * Class AdminCheckRoleMiddleware
 * @package app\admin\middleware
 */
class AdminCheckRoleMiddleware
{

    public function handle(Request $request, \Closure $next)
    {


        return $next($request);
    }
}
