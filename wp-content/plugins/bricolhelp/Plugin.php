<?php

namespace bricolHelp;

use bricolHelp\PostType\TutorialsPostType;
use bricolHelp\Taxonomy\MaterialsTaxonomy;

class Plugin
{
    static public function run()
    {
        // on accroche une méthode pour gérer l'init
        add_action('init', [self::class, 'onInit']);

        // idem pour l'activation du plugin
        register_activation_hook(
            BRICOLHELP_PLUGIN_FILE,
            [self::class, 'onPluginActivation'] // la méthode à déclencher à l'activation du plugin
        );
        // idem pour la désactivation du plugin
        register_deactivation_hook(
            BRICOLHELP_PLUGIN_FILE,
            [self::class, 'onPluginDeactivation'] // la méthode à déclencher à la désactivation du plugin
        );
    }

    static public function onInit()
    {
        // lancer l'enregistrement du CPT
        TutorialsPostType::register();
        MaterialsTaxonomy::register();
    }

        /**
     * onPluginActivation()
     * Actions to perform on plugin activation
     *
     * @return void
     */
    static public function onPluginActivation()
    {
        // associer les caps custom de nos CPT et CT à l'admin
        TutorialsPostType::addCaps();
        MaterialsTaxonomy::addCaps();
    }
    
    /**
     * onPluginDeactivation()
     * Actions to perform on plugin deactivation
     *
     * @return void
     */
    static public function onPluginDeactivation()
    {
        // Dissocier les caps custom de nos CPT et CT de l'admin
        TutorialsPostType::removeCaps();
        MaterialsTaxonomy::removeCaps();
    }
}
