<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 */

namespace TimeHunter\LaravelFileGenerator\Interfaces;


interface TraitTemplateInterface
{

    /**
     * @return string
     */
    public function getDirectory(): string;

    /**
     * @return string
     */
    public function getNamespace(): string;

    /**
     * @return array
     */
    public function getUses(): array;

    /**
     * @return string
     */
    public function getTraitName(): string;

    /**
     * @return array
     */
    public function getTraits(): array;

    /**
     * @return array
     */
    public function getFunctions(): array;
}