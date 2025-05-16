<?php
declare (strict_types=1);

namespace Ledc\ProjectCase\validate;

use think\Validate;

/**
 * 项目案例分类验证
 */
class ProjectCategoryValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'require|integer',
        'title' => 'require|max:255',
        'sort' => 'require|between:0,255',
        'icon' => 'require|max:255',
        'description' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'id.require' => 'id不能为空',
        'id.integer' => 'id必须为数字',
        'title.require' => '标题不能为空',
        'title.max' => '标题长度不能超过255',
        'sort.require' => '排序不能为空',
        'sort.between' => '排序范围错误',
        'icon.require' => '图标不能为空',
        'icon.max' => '图标长度不能超过255',
        'description.require' => '描述不能为空',
    ];

    /**
     * 场景
     * @var array[]
     */
    protected $scene = [
        'create' => ['title', 'sort', 'icon', 'description'],
        'update' => ['title', 'sort', 'icon', 'description'],
    ];
}
