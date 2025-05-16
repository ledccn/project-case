<?php
declare (strict_types=1);

namespace Ledc\ProjectCase\validate;

use think\Validate;

/**
 * 项目案例验证
 */
class ProjectCaseValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'require|integer',
        'case_category_id' => 'require|integer',
        'logo' => 'require|max:255',
        'title' => 'require|max:255',
        'qrcode' => 'require|max:255',
        'official_account' => 'requireWithout:mini_appid|max:255',
        'mini_appid' => 'requireWithout:official_account|max:255',
        'mini_path' => 'require|max:255',
        'description' => 'require',
        'sort' => 'require|integer|between:0,255',
        'enabled' => 'require|in:0,1',
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
        'case_category_id.require' => '项目案例类型不能为空',
        'case_category_id.integer' => '项目案例类型必须为数字',
        'logo.require' => 'logo不能为空',
        'logo.max' => 'logo长度不能超过255',
        'title.require' => '标题不能为空',
        'title.max' => '标题长度不能超过255',
        'qrcode.require' => '二维码不能为空',
        'qrcode.max' => '二维码长度不能超过255',
        'official_account.requireWithout' => '公众号不能为空',
        'official_account.max' => '公众号长度不能超过255',
        'mini_appid.requireWithout' => '小程序appid不能为空',
        'mini_appid.max' => '小程序appid长度不能超过255',
        'mini_path.require' => '小程序路径不能为空',
        'mini_path.max' => '小程序路径长度不能超过255',
        'description.require' => '描述不能为空',
        'sort.require' => '排序不能为空',
        'sort.integer' => '排序必须为数字',
        'sort.between' => '排序范围错误',
        'enabled.require' => '状态不能为空',
        'enabled.in' => '状态值错误',
    ];

    /**
     * 场景
     * @var array[]
     */
    protected $scene = [
        'create' => ['case_category_id', 'logo', 'title', 'qrcode', 'official_account', 'mini_appid', 'description', 'sort', 'enabled'],
        'update' => ['case_category_id', 'logo', 'title', 'qrcode', 'official_account', 'mini_appid', 'description', 'sort', 'enabled'],
    ];
}
