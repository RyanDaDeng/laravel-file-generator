<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:35
 */

namespace TimeHunter\LaravelFileGenerator\Interfaces;


interface ClassTemplateInterface
{

    /**
     * @return string
     */
    public function getDirectory(): string;

    /**
     * @return string
     */
    public function getClassType(): string;

    /**
     * @return mixed
     */
    public function getNamespace(): string;

    /**
     * @return array
     */
    public function getUses(): array;

    /**
     * @return string
     */
    public function getClassName(): string;

    /**
     * @return string
     */
    public function getExtends(): string;

    /**
     * @return array
     */
    public function getImplements(): array;

    /**
     * @return array
     */
    public function getTraits(): array;

    /**
     * @return array
     */
    public function getProperties(): array;

    /**
     * @return array
     */
    public function getFunctions(): array;
}