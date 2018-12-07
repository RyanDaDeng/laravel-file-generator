# Laravel File Generator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]



A Laravel File Generator which allows you to:
1. quickly generate trait, class and interface
2. automate the creation of repeated php files
3. help you generate code structure

The main logic is using Blade template engine to populate the files. Feel free to look into the source code.

## Requirement

This package requires the following dependencies:

- Laravel 5.x
- php > 7 (if you need support for version below 7, please create issue ticket)


## Installation


Via Composer

``` bash
$ composer require timehunter/laravel-file-generator "^1.1.0"
```

If your Laravel framework version <= 5.4, please register the service provider in your config file: /config/app.php, otherwise please skip it.


``` php
'providers'=[
    ....,
    TimeHunter\LaravelFileGenerator\LaravelFileGeneratorServiceProvider::class
]
```

And also ( Laravel framework version <= 5.4)
``` php
'aliases'=[
     ....,
      'LaravelFileGenerator' => TimeHunter\LaravelFileGenerator\Facades\LaravelFileGenerator::class
 ]
```


## Usage

#### Step 1
 Create a file template in which you tell the generator what information will be appended to your file. e.g. the following is an example of Interface file template which implements InterfaceSimpleTemplateInterface:
``` php
<?php

namespace App\Structure;

use TimeHunter\LaravelFileGenerator\Interfaces\InterfaceSimpleTemplateInterface;

class ExampleSimpleInterfaceTemplate implements InterfaceSimpleTemplateInterface
{

    public function getTemplateData()
    {
        return [
            'directory' => app_path() . '/Example',
            'interface_name' => 'ExampleInterface',
            'namespace' => 'App\Example',
            'functions' => [
                'public function get()',
                'public function update()'
            ]
        ];
    }
}
```

- getTemplateData() : return your interface details, please refer to Schema section

#### Step 2
 Pass the template to the publish function from LaravelFileGenerator facade class

``` php
 LaravelFileGenerator::publish(
     new ExampleSimpleInterfaceTemplate(),
     new ExampleSimpleTraitTemplate(),
     new ExampleSimpleInterfaceTemplate()
     ...
 ); // publish() supports miltiple parameters
```
#### Step 3
 Check your folders if the file is generated.
 
 You can also review the class before publishing:

``` php
 return LaravelFileGenerator::preview(new ExampleSimpleInterfaceTemplate());
```

The function returns a View, so you can include it in any controller to see the outcome.

## Interfaces

| Interface                        | Usage                | Description    |
|----------------------------------|----------------------|----------------|
| ClassSimpleTemplateInterface     | array schema type    | Class file     |
| InterfaceSimpleTemplateInterface | array schema type    | Interface file |
| TraitSimpleTemplateInterface     | array schema type    | Trait file     |
| ClassTemplateInterface           | function schema type | Class file     |
| InterfaceTemplateInterface       | function schema type | Interface file |
| TraitTemplateInterface           | function schema type | Trait file     |

For function schema type, you just need to implement all functions from interface.


For array schema type, they have the same function which returns schema of template:

``` php
getTemplateData()
```

#### Trait Schema

``` php
    public function getTemplateData()
    {
        return [
            'directory' => app_path() . '/Example',
            'namespace' => 'App\Example',
            'use' => [
                'App\Http\Controllers\Controller'
            ],
            'trait_name' => 'ExampleTrait',
            'traits' => [
                'ExampleTrait'
            ],
            'functions' => [
                'public function get()',
                'public function update()'
            ]
        ];
    }
```

#### Interface Schema

``` php
    public function getTemplateData()
    {
        return [
            'directory' => app_path() . '/Test',
            'interface_name' => 'ExampleInterface',
            'namespace' => 'App\Example',
            'functions' => [
                'public function get()',
                'public function update()'
            ]
        ];
    }
```


#### Class Schema

``` php
    public function getTemplateData()
    {
        return [
            'class_type' => 'abstract class',
            'directory' => app_path() . '/Example',
            'namespace' =>'App\Example',
            'use' => [
                'App\Http\Controllers\Controller',
            ],
            'class_name' => 'ExampleClass',
            'extends' => 'Controller',
            'implements' => ['sss', 'sss'],
            'traits' => [
                'ExampleTrait'
            ],
            'properties' => [
                'protected $repo'
            ],
            'functions' => [
                'public function get()',
                'public function update()'
            ]
        ];
    }
```


## Security

If you discover any security related issues, please email ryandadeng@gmail.com instead of using the issue tracker.


## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/timehunter/laravel-file-generator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/timehunter/laravel-file-generator.svg?style=flat-square


[link-packagist]: https://packagist.org/packages/timehunter/laravel-file-generator
[link-downloads]: https://packagist.org/packages/timehunter/laravel-file-generator
[link-author]: https://github.com/RyanDaDeng/laravel-file-generator