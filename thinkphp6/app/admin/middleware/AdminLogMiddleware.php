<?php

namespace app\admin\middleware;

use app\Request;

/**
 * 日志
 * Class AdminLogMiddleware
 * @package app\admin\middleware
 */
class AdminLogMiddleware
{
    /**
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        try {
            //记录后台用户的操作记录
        } catch (\Throwable $e) {

        }
        return $next($request);
    }

}