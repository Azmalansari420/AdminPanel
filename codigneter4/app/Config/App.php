<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Base Site URL
     * --------------------------------------------------------------------------
     *
     * URL to your CodeIgniter root. Typically, this will be your base URL,
     * WITH a trailing slash:
     *
     * E.g., http://example.com/
     */
    public string $baseURL = '';

    public function __construct()
    {
        $base  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
        $base .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        $this->baseURL = rtrim($base, '/') . '/';
    }

    
    public array $allowedHostnames = [];

   
    public string $indexPage = '';

   
    public string $uriProtocol = 'REQUEST_URI';

    public string $permittedURIChars = 'a-z 0-9~%.:_\-';

   
    public string $defaultLocale = 'en';

   
    public bool $negotiateLocale = false;

    
    public array $supportedLocales = ['en'];

    
    public string $appTimezone = 'Asia/Kolkata';

   
    public string $charset = 'UTF-8';

    
    public bool $forceGlobalSecureRequests = false;

    
    public array $proxyIPs = [];

    
    public bool $CSPEnabled = false;


    /*constert*/


    









}
