<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:33
 */

namespace TimeHunter\LaravelFileGenerator\Services;


use TimeHunter\LaravelFileGenerator\Interfaces\TraitTemplateInterface;


class TraitFileGenerator extends AbstractFileGenerator
{
    protected $templateView = 'LaravelFileGenerator::trait';

    public function getFileName()
    {
        return $this->templateData['trait_name'];
    }

    public function getTemplateData()
    {
        if ($this->template instanceof TraitTemplateInterface) {
            return [
                'directory' => $this->template->getDirectory(),
                'namespace' => $this->template->getNamespace(),
                'use' => $this->template->getUses(),
                'traits' => $this->template->getTraits(),
                'functions' => $this->template->getFunctions(),
            ];
        }
        return [];
    }
}