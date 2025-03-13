<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

class Autoload extends AutoloadConfig
{
    /** Namespaces */
    public $psr4 = [
        APP_NAMESPACE => APPPATH,
    ];

    /**Class Map      */
    public $classmap = [];

    /*** Files */
    public $files = [];

    /*** Helpers    */
    public $helpers = ['custom_helper','session'];

    /*model*/
    public $models = [
        'App\Models\Crud', 
    ];
}
