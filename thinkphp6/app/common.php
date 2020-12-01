<?php
// 应用公共文件

if (!function_exists('cache_redis')) {
    /**
     * redis Cache
     * @return \think\cache\Driver
     */
    function cache_redis()
    {
        return \think\facade\Cache::store('redis');
    }
}