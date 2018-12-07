<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:33
 */

namespace TimeHunter\LaravelFileGenerator\Services;


use TimeHunter\LaravelFileGenerator\Interfaces\InterfaceTemplateInterface;


class InterfaceFileGenerator extends AbstractFileGenerator
{
    protected $templateView = 'LaravelFileGenerator::interface';

    public function getFileName()
    {
        return $this->templateData['interface_name'];
    }

    public function getTemplateData()
    {
        if ($this->template instanceof InterfaceTemplateInterface) {
            return [
                'interface_name' => $this->template->getInterfaceName(),
                'functions' => $this->template->getFunctions(),
                'namespace' => $this->template->getNamespace(),
            ];
        }
        return [];
    }
}