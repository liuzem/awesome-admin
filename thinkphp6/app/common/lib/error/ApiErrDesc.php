<?php

namespace app\common\lib\error;

class ApiErrDesc
{

    const UNKNOWN_ERR = [0, '未知错误'];
    const ERR_PARAMS = [100, '参数错误'];
    const SUCCESS = [200, 'Success'];
    const ERROR = [400, 'Error'];

    /**
     * 用户登录相关的错误码
     */
    const ERR_LOGIN = [1000, '登录过期'];
    const UNKNOWN_USER = [1001, '用户不存在'];
    const ERR_PASSWORD = [1002, '密码错误'];
    const ERR_CREATE_TOKEN = [1003, '创建Token失败'];

    /**
     * 验证相关的错误码
     */
    const ERR_HANDLE = [4001, '处理错误'];


}