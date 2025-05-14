<?php

use crmeb\utils\Json;

if (!function_exists('api_response_json')) {
    /**
     * JSON响应
     * @return Json
     */
    function api_response_json(): Json
    {
        return app('json');
    }
}

if (!function_exists('response_json')) {
    /**
     * JSON响应
     * @return Json
     */
    function response_json(): Json
    {
        return app('json');
    }
}

if (!function_exists('filter_where')) {
    /**
     * 过滤where内的：null，空字符串
     * @param array $where
     * @return array
     */
    function filter_where(array $where): array
    {
        return array_filter($where, function ($v) {
            return null !== $v && '' !== $v;
        });
    }
}

