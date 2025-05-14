<?php

namespace Ledc\ProjectCase\dao;

use app\dao\BaseDao;
use Ledc\ProjectCase\model\EbProjectCase;

/**
 * 项目案例
 */
class ProjectCaseDao extends BaseDao
{
    /**
     * 获取模型
     * @return string
     */
    public function setModel(): string
    {
        return EbProjectCase::class;
    }
}