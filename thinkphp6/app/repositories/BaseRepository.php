<?php

namespace app\repositories;

use app\common\services\auth\JwtAuth;

/**
 * Class BaseServices
 * @package app\services
 */
abstract class BaseRepository
{
    protected $dao;

    /**
     * 根据类型和主键id创建token
     * @param int $id
     * @param $type
     * @return mixed
     */
    public function createToken(int $id, $type)
    {
        $jwtAuth = app()->make(JwtAuth::class);
        return $jwtAuth->createToken($id, $type);
    }
}
