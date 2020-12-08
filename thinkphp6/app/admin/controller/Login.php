<?php

namespace app\admin\controller;

use app\admin\validate\LoginValidate;
use app\BaseController;
use app\repositories\admin\AdminUserRepository;
use think\facade\App;

/**
 * 后台登陆
 * Class Login
 * @package app\adminapi\controller
 */
class Login extends BaseController
{
    const USER_TYPE = 'admin';

    /**
     * Login constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    /**
     * 登陆
     *
     * @param AdminUserRepository $adminUserRepository
     * @return string
     */
    public function login(AdminUserRepository $adminUserRepository)
    {
        [$account, $password] = $this->parameter(['username', 'password']);

        validate(LoginValidate::class)->check(['account' => $account, 'pwd' => $password]);
        $ret = $adminUserRepository->login($account, $password, self::USER_TYPE);

        return $this->success('登录成功', $ret);
    }

}
