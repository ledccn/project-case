<?php

namespace Ledc\ProjectCase\services;

use app\services\BaseServices;
use Ledc\ProjectCase\dao\ProjectCaseDao;
use ReflectionException;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

/**
 * 项目案例服务
 */
class ProjectCaseService extends BaseServices
{
    /**
     * 构造方法
     * @param ProjectCaseDao $dao
     */
    public function __construct(ProjectCaseDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return ProjectCaseDao
     */
    public function getDao(): ProjectCaseDao
    {
        return $this->dao;
    }

    /**
     * 获取列表
     * @param array $where
     * @return array
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException|ReflectionException
     */
    public function getList(array $where = []): array
    {
        [$page, $limit] = $this->getPageValue();
        $list = $this->dao->selectList($where, '*', $page, $limit);
        $count = $this->dao->count($where);
        return compact('list', 'count');
    }
}