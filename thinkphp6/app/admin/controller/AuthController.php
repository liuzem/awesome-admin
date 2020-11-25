<?php

namespace app\admin\controller;

/**
 * 基类 所有控制器继承的类
 * Class AuthController
 * @package app\adminapi\controller
 */
class AuthController
{
    /**
     * 当前登陆管理员信息
     * @var
     */
    protected $adminInfo;

    /**
     * 当前登陆管理员ID
     * @var
     */
    protected $adminId;

    /**
     * 当前管理员权限
     * @var array
     */
    protected $auth = [];


    /**
     * 初始化
     */
    protected function initialize()
    {
    }

}
