<?php

namespace Ledc\ProjectCase\dao;

use app\dao\BaseDao;
use Ledc\ProjectCase\model\EbProjectCaseCategory;

/**
 * 项目案例分类
 */
class ProjectCaseCategoryDao extends BaseDao
{
    /**
     * 获取模型
     * @return string
     */
    public function setModel(): string
    {
        return EbProjectCaseCategory::class;
    }
}