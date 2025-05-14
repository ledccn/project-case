<?php

namespace Ledc\ProjectCase\model;

use think\Model;

/**
 * eb_project_case 项目案例表
 * @property integer $id (主键)
 * @property integer $case_category_id 项目案例类别
 * @property string $logo Logo
 * @property string $title 项目名称
 * @property string $qrcode 二维码或小程序码
 * @property string $official_account 公众号名称
 * @property string $mini_appid 小程序appid
 * @property string $mini_path 小程序页面路径
 * @property string $description 描述
 * @property integer $sort 排序
 * @property integer $enabled 启用
 * @property string $create_time 创建时间
 * @property string $update_time 更新时间
 */
class EbProjectCase extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eb_project_case';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $pk = 'id';
}
