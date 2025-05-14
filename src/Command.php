<?php
declare (strict_types=1);

namespace Ledc\ProjectCase;

use Ledc\ThinkModelTrait\Contracts\HasMigrationCommand;
use think\console\Input;
use think\console\Output;

/**
 * 安装数据库迁移文件
 */
class Command extends \think\console\Command
{
    use HasMigrationCommand;

    /**
     * @return void
     */
    protected function configure()
    {
        // 指令配置
        $this->setName('install:migrate:project-case')
            ->setDescription('安装插件的数据库迁移文件');

        // 迁移文件映射
        $this->setFileMaps([
            'CreateProjectCaseCategory' => dirname(__DIR__) . '/migrations/20250513021022.php',
            'CreateProjectCase' => dirname(__DIR__) . '/migrations/20250513021029.php',
        ]);
    }

    /**
     * @param Input $input
     * @param Output $output
     * @return void
     */
    protected function execute(Input $input, Output $output)
    {
        $this->eachFileMaps($input, $output);
    }
}
