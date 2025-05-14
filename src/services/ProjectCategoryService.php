<?php

namespace Ledc\ProjectCase\services;

use app\services\BaseServices;
use Ledc\ProjectCase\dao\ProjectCategoryDao;

/**
 * 项目案例分类服务
 */
class ProjectCategoryService extends BaseServices
{
    /**
     * 构造方法
     * @param ProjectCategoryDao $dao
     */
    public function __construct(ProjectCategoryDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return ProjectCategoryDao
     */
    public function getDao(): ProjectCategoryDao
    {
        return $this->dao;
    }
}