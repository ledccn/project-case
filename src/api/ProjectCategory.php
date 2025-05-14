<?php
declare (strict_types=1);

namespace Ledc\ProjectCase\api;

use app\Request;
use Ledc\ProjectCase\model\EbProjectCaseCategory;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response;

/**
 * 项目案例分类
 */
class ProjectCategory
{
    /**
     * 显示资源列表
     * @method GET
     * @param Request $request
     * @return Response
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function index(Request $request): Response
    {
        $field = $request->get('field', 'sort');
        $order = $request->get('order', 'desc');
        if (!in_array($field, EbProjectCaseCategory::ORDER_FIELDS)) {
            return response_json()->fail('排序字段错误');
        }

        $model = new EbProjectCaseCategory();
        $query = $model->db();

        return response_json()->success('ok', [
            'list' => $query->order($field, $order)->select()->toArray(),
            'count' => $query->count(),
        ]);
    }

    /**
     * 显示指定的资源
     * @method GET
     * @param int|string $id
     * @return Response
     */
    public function read($id): Response
    {
        return response_json()->success('ok', EbProjectCaseCategory::findOrFail((int)$id)->toArray());
    }
}
