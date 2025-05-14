<?php
declare (strict_types=1);

namespace Ledc\ProjectCase\adminapi;

use app\adminapi\controller\AuthController;
use app\Request;
use Ledc\ProjectCase\model\EbProjectCase;
use Ledc\ProjectCase\services\ProjectCaseService;
use Ledc\ProjectCase\validate\ProjectCaseValidate;
use ReflectionException;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\App;
use think\Response;

/**
 * 项目案例
 */
class ProjectCase extends AuthController
{
    /**
     * @var ProjectCaseService
     */
    protected $services;

    /**
     * 构造方法
     * @param App $app
     * @param ProjectCaseService $services
     */
    public function __construct(App $app, ProjectCaseService $services)
    {
        parent::__construct($app);
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
        $where = $request->getMore(['case_category_id', 'enabled']);
        return response_json()->success($this->services->getList(array_filter($where, function ($v) {
            return null !== $v && '' !== $v;
        })));
    }

    /**
     * 保存新建的资源
     * @method POST
     * @param Request $request
     * @return Response
     */
    public function save(Request $request): Response
    {
        $id = $request->post('id/d');
        $data = $request->postMore([
            'case_category_id',
            'logo',
            'title',
            'qrcode',
            ['official_account', ''],
            ['mini_appid', ''],
            ['mini_path', ''],
            'description',
            ['sort', 100],
            ['enabled', 1],
        ]);
        validate(ProjectCaseValidate::class)->scene($id ? 'update' : 'create')->check($data);

        if ($id) {
            $model = EbProjectCase::findOrFail($id);
            $model->save($data);
        } else {
            $model = EbProjectCase::create($data);
        }

        return response_json()->success('ok', $model->toArray());
    }

    /**
     * 显示指定的资源
     * @method GET
     * @param Request $request
     * @return Response
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function read(Request $request): Response
    {
        $id = $request->get('id/d');
        return response_json()->success('ok', $this->services->getDao()->get($id)->toArray());
    }

    /**
     * 删除指定资源
     * @method DELETE
     * @param int|string $id
     * @param Request $request
     * @return Response
     */
    public function delete($id, Request $request): Response
    {
        $ids = is_array($id) ? $id : explode('_', $id);
        EbProjectCase::destroy($ids);
        return response_json()->success('ok');
    }
}
