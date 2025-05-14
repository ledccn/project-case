<?php

use app\api\middleware\AuthTokenMiddleware;
use app\api\middleware\StationOpenMiddleware;
use app\http\middleware\AllowOriginMiddleware;
use Ledc\ProjectCase\api\ProjectCase;
use Ledc\ProjectCase\api\ProjectCategory;
use think\facade\Route;

/**
 * 项目案例 相关路由
 */
Route::group('project_case', function () {
    Route::get('case/list', implode('@', [ProjectCase::class, 'index']))->option(['real_name' => '项目案例列表']);
    Route::get('case/read/:id', implode('@', [ProjectCase::class, 'read']))->option(['real_name' => '项目案例详情']);
    Route::get('category/list', implode('@', [ProjectCategory::class, 'index']))->option(['real_name' => '项目分类列表']);
    Route::get('category/read/:id', implode('@', [ProjectCategory::class, 'read']))->option(['real_name' => '项目分类详情']);
})->middleware(AllowOriginMiddleware::class)
    ->middleware(StationOpenMiddleware::class)
    ->middleware(AuthTokenMiddleware::class, false)
    ->option(['mark' => 'project_case', 'mark_name' => '项目案例']);