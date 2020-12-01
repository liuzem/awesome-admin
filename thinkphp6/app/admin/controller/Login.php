<?php

namespace app\admin\controller;

use app\admin\validate\LoginValidate;
use app\common\base\BaseController;
use think\facade\App;
/**
 * 后台登陆
 * Class Login
 * @package app\adminapi\controller
 */
class Login extends BaseController
{

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
     * @return string
     */
    public function login()
    {
        [$account, $password] = $this->parameter(['account', 'pwd']);

        validate(LoginValidate::class)->check(['account' => $account, 'pwd' => $password]);

        return $this->success();
    }

}
