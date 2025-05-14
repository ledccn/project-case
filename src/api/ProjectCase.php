<?php
declare (strict_types=1);

namespace Ledc\ProjectCase\api;

use app\Request;
use Ledc\ProjectCase\model\EbProjectCase;
use Ledc\ProjectCase\services\ProjectCaseService;
use ReflectionException;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response;

/**
 * 项目案例
 */
class ProjectCase
{
    /**
     * @var ProjectCaseService
     */
    protected ProjectCaseService $services;

    /**
     * 构造方法
     * @param ProjectCaseService $services
     */
    public function __construct(ProjectCaseService $services)
    {
        $this->services = $services;
    }

    /**
     * 显示资源列表
     * @method GET
     * @param Request $request
     * @return Response
     * @throws ReflectionException
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function index(Request $request): Response
    {
        $where = $request->getMore(['case_category_id']);
        $where['enabled'] = 1;
        return response_json()->success($this->services->getList(array_filter($where, function ($v) {
            return null !== $v && '' !== $v;
        })));
    }

    /**
     * 显示指定的资源
     * @method GET
     * @param int|string $id
     * @return Response
     */
    public function read($id): Response
    {
        return response_json()->success('ok', EbProjectCase::findOrFail((int)$id)->toArray());
    }
}
