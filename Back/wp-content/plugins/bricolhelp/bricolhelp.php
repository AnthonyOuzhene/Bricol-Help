<?php

namespace bricolHelp;

/**
 * Plugin Name: bricolhelp
 */

 // on injecte l'autoload de composer
require __DIR__ . '/vendor/autoload.php';

// chemin absolu vers le fichier
const BRICOLHELP_PLUGIN_FILE = __FILE__;

// on définit le chemin des templates de ce plugin
define('BRICOLHELP_TEMPLATES_DIR', __DIR__ . '/templates');

 // on démarre le plugin
Plugin::run();