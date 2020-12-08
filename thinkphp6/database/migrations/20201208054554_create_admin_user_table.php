<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateAdminUserTable extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $this->table('admin_users')
            ->addColumn('account', 'string', ['limit' => '20', 'comment' => '后台管理员账号'])
            ->addColumn('pwd', 'string', ['limit' => '32', 'comment' => '后台管理员密码'])
            ->addColumn('real_name', 'string', ['limit' => '16', 'comment' => '后台管理员姓名'])
            ->addColumn('roles', 'string', ['limit' => '16', 'comment' => '后台管理员权限(menus_id)'])
            ->addColumn('last_ip', 'string', ['limit' => '16', 'comment' => '后台管理员最后一次登录ip', 'default' => null])
            ->addColumn('last_time', 'integer', ['limit' => '10', 'comment' => '后台管理员最后一次登录时间', 'default' => 0, 'null' => true])
            ->addColumn('login_count', 'integer', ['limit' => '10', 'comment' => '登录次数', 'default' => 0])
            ->addColumn('level', 'integer', ['limit' => '3', 'comment' => '后台管理员级别', 'default' => 1])
            ->addColumn('status', 'integer', ['limit' => '1', 'comment' => '后台管理员状态 1有效0无效', 'default' => 1])
            ->addColumn('is_del', 'integer', ['limit' => '1', 'comment' => '是否删除', 'default' => 0])
            ->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('admin_users');
    }
}
