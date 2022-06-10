<?php

namespace bricolHelp;

use bricolHelp\Classes\Database;
use bricolHelp\PostType\TutorialsPostType;
use bricolHelp\Role\ProfessionalRole;
use bricolHelp\Role\AdvancedRole;
use bricolHelp\Taxonomy\CategoriesTaxonomy;
use bricolHelp\Taxonomy\MaterialsTaxonomy;
use bricolHelp\Taxonomy\ToolsTaxonomy;

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
        CategoriesTaxonomy::register();
        ToolsTaxonomy::register();
    }

    /**
     * onPluginActivation()
     * Actions to perform on plugin activation
     *
     * @return void
     */
    static public function onPluginActivation()
    {
        // déclaration des rôles custom
        ProfessionalRole::register();
        AdvancedRole::register();


        // associer les caps custom de nos CPT et CT à l'admin
        TutorialsPostType::addCaps();
        MaterialsTaxonomy::addCaps();
        CategoriesTaxonomy::addCaps();
        ToolsTaxonomy::addCaps();
    }

    /**
     * onPluginDeactivation()
     * Actions to perform on plugin deactivation
     *
     * @return void
     */
    static public function onPluginDeactivation()
    {

        // on retire les rôles custom
        ProfessionalRole::unregister();
        AdvancedRole::unregister();

        // Dissocier les caps custom de nos CPT et CT de l'admin
        TutorialsPostType::removeCaps();
        MaterialsTaxonomy::removeCaps();
        CategoriesTaxonomy::removeCaps();
        ToolsTaxonomy::removeCaps();

        // on déclenche la création de la table custom tutorial avec FK post_id
        Database::generateTables();

    }
}
