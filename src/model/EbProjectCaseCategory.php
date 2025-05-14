<?php

namespace Ledc\ProjectCase\model;

use think\Model;

/**
 * eb_project_case_category 项目案例类别表
 * @property integer $id (主键)
 * @property string $title 类型标题
 * @property integer $sort 排序
 * @property string $icon 图标
 * @property string $description 描述
 * @property string $create_time 创建时间
 * @property string $update_time 更新时间
 */
class EbProjectCaseCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eb_project_case_category';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $pk = 'id';

    /**
     * 可排序字段
     * @var array
     */
    public const ORDER_FIELDS = ['id', 'sort'];
}
