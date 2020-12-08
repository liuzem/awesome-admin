<?php
// +----------------------------------------------------------------------
// | CRMEB [ CRMEB赋能开发者，助力企业发展 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2020 https://www.crmeb.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed CRMEB并不是自由软件，未经许可不能去掉CRMEB相关版权
// +----------------------------------------------------------------------
// | Author: CRMEB Team <admin@crmeb.com>
// +----------------------------------------------------------------------

namespace app\dao\admin;


use app\dao\BaseDao;
use app\model\admin\user\AdminUser;

/**
 * Class SystemAdminDao
 * @package app\dao\system\admin
 */
class AdminUserDao extends BaseDao
{
    protected $model;

    public function __construct()
    {
        $this->model = AdminUser::class;
    }

    /**
     * 根据账号获取用户信息
     * @param string $account
     * @return array|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function infoByAccount(string $account)
    {
        return $this->model->where(['account' => $account, 'is_del' => 0, 'status' => 1])->find();
    }
}
