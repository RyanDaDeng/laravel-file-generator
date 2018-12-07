<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:35
 */

namespace TimeHunter\LaravelFileGenerator\Interfaces;


interface TraitTemplateInterface
{

    /**
     * @return string
     */
    public function getDirectory();

    /**
     * @return mixed
     */
    public function getNamespace();

    /**
     * @return array
     */
    public function getUses();

    /**
     * @return string
     */
    public function getTraitName();

    /**
     * @return array
     */
    public function getTraits();

    /**
     * @return array
     */
    public function getFunctions();
}