<?php
declare (strict_types = 1);

namespace app;

use app\common\services\json\Json;
use think\Service;

/**
 * 应用服务类
 */
class AppService extends Service
{
    public $bind = [
        'json' => Json::class,
    ];
    public function register()
    {
        // 服务注册
    }

    public function boot()
    {
        // 服务启动
    }
}
