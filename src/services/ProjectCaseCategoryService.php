<?php

namespace Ledc\ProjectCase\services;

use app\services\BaseServices;
use Ledc\ProjectCase\dao\ProjectCaseCategoryDao;

/**
 * 项目案例分类服务
 */
class ProjectCaseCategoryService extends BaseServices
{
    /**
     * 构造方法
     * @param ProjectCaseCategoryDao $dao
     */
    public function __construct(ProjectCaseCategoryDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return ProjectCaseCategoryDao
     */
    public function getDao(): ProjectCaseCategoryDao
    {
        return $this->dao;
    }
}