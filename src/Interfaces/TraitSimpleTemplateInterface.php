<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:35
 */

namespace TimeHunter\LaravelFileGenerator\Interfaces;


interface TraitSimpleTemplateInterface
{
    public function getDirectory();

    public function getTemplateData();
}