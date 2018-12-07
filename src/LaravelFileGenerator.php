<?php

namespace TimeHunter\LaravelFileGenerator;

use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;
use TimeHunter\LaravelFileGenerator\Interfaces\ClassTemplateInterface;
use TimeHunter\LaravelFileGenerator\Interfaces\InterfaceSimpleTemplateInterface;
use TimeHunter\LaravelFileGenerator\Interfaces\InterfaceTemplateInterface;
use TimeHunter\LaravelFileGenerator\Interfaces\TraitSimpleTemplateInterface;
use TimeHunter\LaravelFileGenerator\Interfaces\TraitTemplateInterface;
use TimeHunter\LaravelFileGenerator\Services\ClassFileGenerator;
use TimeHunter\LaravelFileGenerator\Services\InterfaceFileGenerator;
use TimeHunter\LaravelFileGenerator\Services\TraitFileGenerator;


class LaravelFileGenerator
{

    public function getGenerator($object)
    {
        if ($object instanceof ClassSimpleTemplateInterface || $object instanceof ClassTemplateInterface) {
            return new ClassFileGenerator($object);
        }

        if ($object instanceof InterfaceSimpleTemplateInterface || $object instanceof InterfaceTemplateInterface) {
            return new InterfaceFileGenerator($object);
        }

        if ($object instanceof TraitSimpleTemplateInterface || $object instanceof TraitTemplateInterface) {
            return new TraitFileGenerator($object);
        }
        return null;
    }

    public function publish(...$objects)
    {
        foreach ($objects as $object) {
            $generator = $this->getGenerator($object);
            $generator->publish();
        }
    }

    public function preview($object)
    {
        $generator = $this->getGenerator($object);
        return $generator->preview();
    }
}