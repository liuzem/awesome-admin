<?php

namespace app\admin\validate;

use think\Validate;

/**
 *
 * Class StoreOrderValidate
 * @package app\adminapi\validates
 */
class LoginValidate extends Validate
{

    protected $rule = [
        'account'=>'require',
        'pwd'=>'require',
    ];

    protected $message = [
        'account.require'=>'账号不可为空！',
        'pwd.require'=>'密码不可为空！',
    ];

    protected $scene = [

    ];
}