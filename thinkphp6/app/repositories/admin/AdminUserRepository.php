<?php

namespace app\repositories\admin;

use app\common\services\exception\AdminException;
use app\dao\admin\AdminUserDao;
use app\repositories\BaseRepository;

/**
 * Class BaseServices
 * @package app\services
 */
class AdminUserRepository extends BaseRepository
{
    public function __construct(AdminUserDao $adminUserDao)
    {
        $this->dao = $adminUserDao;
    }

    /**
     * 登录
     * @param string $account
     * @param string $password
     * @param string $type
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function login(string $account, string $password, string $type): array
    {
        $adminInfo = $this->verifyLogin($account, $password);
        $tokenInfo = $this->createToken($adminInfo->id, $type);
        return ['token' => $tokenInfo['token']];
    }

    /**
     * 验证及存储用户登录信息
     * @param string $account
     * @param string $password
     * @return array|\think\Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    private function verifyLogin(string $account, string $password)
    {
        $adminInfo = $this->dao->infoByAccount($account);
        if (!$adminInfo) throw new AdminException('管理员不存在!');
        if (!$adminInfo->status) throw new AdminException('您已被禁止登录!');
        if (!password_verify($password, $adminInfo->pwd)) throw new AdminException('账号或密码错误，请重新输入');
        $adminInfo->last_time = time();
        $adminInfo->last_ip = app('request')->ip();
        $adminInfo->login_count++;
        $adminInfo->save();

        return $adminInfo;
    }
}
