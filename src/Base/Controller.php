<?php

namespace Src\Base;

class Controller
{
    public $plugin_version;
    public $plugin_path;
    public $plugin_url;
    public $plugin;

    public function __construct()
    {
        $this->plugin_version = PLUGIN_VERSION ;
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2) );
        $this->plugin = plugin_basename( dirname( __FILE__, 2) );
    }
}