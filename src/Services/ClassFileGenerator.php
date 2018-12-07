<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:33
 */

namespace TimeHunter\LaravelFileGenerator\Services;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassTemplateInterface;


class ClassFileGenerator extends AbstractFileGenerator
{
    protected $templateView = 'LaravelFileGenerator::class';

    public function getFileName()
    {
        return $this->templateData['class_name'];
    }

    public function getTemplateData()
    {
        if ($this->template instanceof ClassTemplateInterface) {
            return [
                'class_type' => $this->template->getClassType(),
                'directory' => $this->template->getDirectory(),
                'namespace' => $this->template->getNamespace(),
                'use' => $this->template->getUses(),
                'class_name' => $this->template->getClassName(),
                'extends' => $this->template->getExtends(),
                'implements' => $this->template->getImplements(),
                'traits' => $this->template->getTraits(),
                'properties' => $this->template->getProperties(),
                'functions' => $this->template->getFunctions(),
            ];
        }
        return [];
    }
}