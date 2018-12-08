<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:33
 */

namespace TimeHunter\LaravelFileGenerator\Services;


class RouteFileGenerator extends AbstractFileGenerator
{
    protected $templateView = 'LaravelFileGenerator::routes';

    public function getFileName()
    {
        return 'routes';
    }

    public function getTemplateData()
    {
        return [];
    }
}