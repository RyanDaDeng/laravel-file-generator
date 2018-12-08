<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午8:33
 */

namespace TimeHunter\LaravelFileGenerator\Services;

use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;
use TimeHunter\LaravelFileGenerator\Interfaces\InterfaceSimpleTemplateInterface;
use TimeHunter\LaravelFileGenerator\Interfaces\TraitSimpleTemplateInterface;


abstract class AbstractFileGenerator
{

    protected $templateView;
    protected $mainView = 'LaravelFileGenerator::main';
    protected $template;
    protected $templateData;
    protected $previewView = 'LaravelFileGenerator::preview';

    public function __construct($template)
    {
        $this->template = $template;
        $this->templateData = $this->getData();
    }

    public function getData()
    {
        if ($this->template instanceof ClassSimpleTemplateInterface) {
            return $this->template->getTemplateData();
        }
        if ($this->template instanceof TraitSimpleTemplateInterface) {
            return $this->template->getTemplateData();
        }
        if ($this->template instanceof InterfaceSimpleTemplateInterface) {
            return $this->template->getTemplateData();
        }

        return $this->getTemplateData();
    }

    public function checkDir($directory)
    {
        //Check if the directory already exists.
        if(!is_dir($directory)){
            //Directory does not exist, so lets create it.
            mkdir($directory, 0755, true);
        }

    }

    public function publish()
    {
        $directory = $this->templateData['directory'];

        $final = $this->prepareView();
        $this->checkDir($directory);

        $filename = $directory . '/' . $this->getFileName() . '.php';

        app('files')->put($filename, $final);
    }

    abstract public function getFilename();

    /**
     * @return mixed|string
     */
    protected function getTemplateView()
    {
        return $this->templateView;
    }

    /**
     * @return mixed|string
     */
    protected function getMainView()
    {
        return $this->mainView;
    }

    public function preview()
    {
        $directory = storage_path('preview');

        $final = $this->prepareView();
        $this->checkDir($directory);
        $filename = storage_path('preview/preview.php');
        app('files')->put($filename, $final);

        return app('view')->make($this->previewView, ['filename' => $filename]);
    }

    abstract public function getTemplateData();

    public function prepareView()
    {

        $prepare = app('view')->make($this->getTemplateView(), ['data' => $this->templateData])->render();

        $final = app('view')->make($this->getMainView(), ['data' => $prepare, 'header' => '<?php'])->render();

        return $final;
    }

}