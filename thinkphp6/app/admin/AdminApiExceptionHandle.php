<?php

namespace app\admin;

use think\exception\Handle;
use think\facade\Env;
use think\Response;
use Throwable;

class AdminApiExceptionHandle extends Handle
{

    /**
     * 记录异常信息（包括日志或者其它方式记录）
     *
     * @access public
     * @param Throwable $exception
     * @return void
     */
    public function report(Throwable $exception): void
    {
        // 使用内置的方式记录异常日志
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {
        $massageData = Env::get('app_debug', false) ? [
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTrace(),
            'previous' => $e->getPrevious(),
        ] : [];
        // 添加自定义异常处理机制
        if ($e instanceof \Exception) {
            return app('json')->code(200)->make(400, $e->getMessage(), $massageData);
        }
    }

}