<?php

use app\adminapi\middleware\AdminAuthTokenMiddleware;
use app\adminapi\middleware\AdminCheckRoleMiddleware;
use app\adminapi\middleware\AdminLogMiddleware;
use app\http\middleware\AllowOriginMiddleware;
use Ledc\ProjectCase\adminapi\ProjectCase;
use Ledc\ProjectCase\adminapi\ProjectCategory;
use think\facade\Route;

/**
 * 项目案例 相关路由
 */
Route::group('project', function () {
    Route::group('case', function () {
        Route::get('index', implode('@', [ProjectCase::class, 'index']))->option(['real_name' => '项目案例列表']);
        Route::post('save', implode('@', [ProjectCase::class, 'save']))->option(['real_name' => '保存项目案例']);
        Route::get('read', implode('@', [ProjectCase::class, 'read']))->option(['real_name' => '项目案例详情']);
        Route::delete(':id', implode('@', [ProjectCase::class, 'delete']))->option(['real_name' => '删除项目案例']);
    });

    Route::group('category', function () {
        Route::get('index', implode('@', [ProjectCategory::class, 'index']))->option(['real_name' => '项目分类列表']);
        Route::post('save', implode('@', [ProjectCategory::class, 'save']))->option(['real_name' => '保存项目分类']);
        Route::delete(':id', implode('@', [ProjectCategory::class, 'delete']))->option(['real_name' => '删除项目分类']);
    });
})->middleware([
    AllowOriginMiddleware::class,
    AdminAuthTokenMiddleware::class,
    AdminCheckRoleMiddleware::class,
    AdminLogMiddleware::class
])->option(['mark' => 'project', 'mark_name' => '管理项目案例']);