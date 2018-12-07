<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:35
 */

namespace TimeHunter\LaravelFileGenerator\Interfaces;


interface InterfaceTemplateInterface
{

    /**
     * @return string
     */
    public function getDirectory(): string;


    /**
     * @return string
     */
    public function getInterfaceName(): string;


    /**
     * @return array
     */
    public function getFunctions(): array;

    /**
     * @return string
     */
    public function getNamespace(): string;
}