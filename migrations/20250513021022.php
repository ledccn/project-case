<?php

use Phinx\Db\Adapter\AdapterInterface;
use Phinx\Db\Adapter\MysqlAdapter;
use think\migration\Migrator;
use think\migration\db\Column;

/**
 * 项目案例类型表
 */
class CreateProjectCaseCategory extends Migrator
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
        $table = $this->table('project_case_category', ['comment' => '项目案例类别表', 'signed' => false]);
        $table->addColumn('title', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '类型标题', 'null' => false])
            ->addColumn('sort', AdapterInterface::PHINX_TYPE_INTEGER, ['limit' => MysqlAdapter::INT_TINY, 'comment' => '排序', 'null' => false, 'default' => 100, 'signed' => false])
            ->addColumn('icon', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '图标', 'null' => false, 'default' => ''])
            ->addColumn('description', AdapterInterface::PHINX_TYPE_TEXT, ['limit' => MysqlAdapter::TEXT_REGULAR, 'comment' => '描述', 'null' => true, 'default' => null])
            ->addColumn('create_time', 'datetime', ['comment' => '创建时间', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('update_time', 'datetime', ['comment' => '更新时间', 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addIndex(['title'], ['unique' => true, 'name' => 'idx_title'])
            ->addIndex(['sort'], ['name' => 'idx_sort'])
            ->create();
    }
}
