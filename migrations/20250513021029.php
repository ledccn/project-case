<?php

use Phinx\Db\Adapter\AdapterInterface;
use Phinx\Db\Adapter\MysqlAdapter;
use think\migration\Migrator;
use think\migration\db\Column;

/**
 * 项目案例表
 */
class CreateProjectCase extends Migrator
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
    public function change()
    {
        $table = $this->table('project_case', ['comment' => '项目案例表', 'signed' => false]);
        $table->addColumn('case_category_id', AdapterInterface::PHINX_TYPE_INTEGER, ['comment' => '项目案例类别', 'null' => false, 'signed' => false])
            ->addColumn('logo', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => 'Logo', 'null' => false])
            ->addColumn('title', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '项目名称', 'null' => false])
            ->addColumn('qrcode', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '二维码或小程序码', 'null' => false, 'default' => ''])
            ->addColumn('official_account', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '公众号名称', 'null' => false, 'default' => ''])
            ->addColumn('mini_appid', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '小程序appid', 'null' => false, 'default' => ''])
            ->addColumn('mini_path', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '小程序页面路径', 'null' => false, 'default' => ''])
            ->addColumn('description', AdapterInterface::PHINX_TYPE_TEXT, ['limit' => MysqlAdapter::TEXT_REGULAR, 'comment' => '描述', 'null' => true, 'default' => null])
            ->addColumn('sort', AdapterInterface::PHINX_TYPE_INTEGER, ['limit' => MysqlAdapter::INT_TINY, 'comment' => '排序', 'null' => false, 'default' => 100, 'signed' => false])
            ->addColumn('enabled', AdapterInterface::PHINX_TYPE_INTEGER, ['limit' => MysqlAdapter::INT_TINY, 'comment' => '启用', 'null' => false, 'default' => 1, 'signed' => false])
            ->addColumn('create_time', 'datetime', ['comment' => '创建时间', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('update_time', 'datetime', ['comment' => '更新时间', 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('case_category_id', 'project_case_category', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addIndex(['sort'], ['name' => 'idx_sort'])
            ->addIndex(['enabled'], ['name' => 'idx_enabled'])
            ->create();
    }
}
