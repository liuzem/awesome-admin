<?php

namespace app\model\admin\user;

use app\model\BaseModel;
use think\Model;

/**
 * 管理员模型
 * Class SystemAdmin
 * @package app\model\system\admin
 */
class AdminUser extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'admin_users';

    protected $insert = [];

}
