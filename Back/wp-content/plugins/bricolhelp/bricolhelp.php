<?php

namespace bricolHelp;

/**
 * Plugin Name: bricolhelp
 */

 // on injecte l'autoload de composer
require __DIR__ . '/vendor/autoload.php';

const BRICOLHELP_PLUGIN_FILE = __FILE__;

 // on démarre le plugin
Plugin::run();