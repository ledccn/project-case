<?php
declare (strict_types=1);

namespace Ledc\ProjectCase\adminapi;

use app\adminapi\controller\AuthController;
use app\Request;
use Ledc\ProjectCase\model\EbProjectCaseCategory;
use Ledc\ProjectCase\validate\ProjectCategoryValidate;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response;

/**
 * 项目案例类型
 */
class ProjectCategory extends AuthController
{
    /**
     * 显示资源列表
     *
     * @param Request $request
     * @return Response
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function index(Request $request): Response
    {
        $order = $request->get('order', 'desc');

        $model = new EbProjectCaseCategory();
        $query = $model->db();

        return response_json()->success('ok', [
            'list' => $query->order('sort', $order)->select()->toArray(),
            'count' => $query->count(),
        ]);
    }

    /**
     * 保存新建的资源
     *
     * @param Request $request
     * @return Response
     */
    public function save(Request $request): Response
    {
        $id = $request->param('id/d');
        $data = $request->postMore(['title', 'sort', 'icon', 'description']);
        validate(ProjectCategoryValidate::class)->scene($id ? 'update' : 'create')->check($data);

        if ($id) {
            $model = EbProjectCaseCategory::findOrFail($id);
            $model->save($data);
        } else {
            $model = EbProjectCaseCategory::create($data);
        }

        return response_json()->success('ok', $model->toArray());
    }

    /**
     * 删除指定资源
     *
     * @param int|string $id
     * @param Request $request
     * @return Response
     */
    public function delete($id, Request $request): Response
    {
        $ids = is_array($id) ? $id : explode('_', $id);
        EbProjectCaseCategory::destroy($ids);
        return response_json()->success('ok');
    }
}
