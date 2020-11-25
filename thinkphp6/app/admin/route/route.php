<?php

use think\facade\Route;
use think\facade\Config;
use think\Response;
use app\http\middleware\AllowOriginMiddleware;

/**
 * 无需授权的接口
 */
Route::group(function () {

})->middleware(AllowOriginMiddleware::class);

/**
 * miss 路由
 */
Route::miss(function () {
    if (app()->request->isOptions()) {
        $header = Config::get('cookie.header');
        $header['Access-Control-Allow-Origin'] = app()->request->header('origin');
        return Response::create('ok')->code(200)->header($header);
    } else
        return Response::create()->code(404);
});