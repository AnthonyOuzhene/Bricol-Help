<?php

namespace bricolHelp;

use bricolHelp\Api\Tutorials;
use bricolHelp\Classes\Database;
use bricolHelp\PostType\TutorialsPostType;
use bricolHelp\Role\ProfessionalRole;
use bricolHelp\Role\AdvancedRole;
use bricolHelp\Taxonomy\CategoriesTaxonomy;
use bricolHelp\Taxonomy\MaterialsTaxonomy;
use bricolHelp\Taxonomy\ToolsTaxonomy;
use bricolHelp\User\Register;

class Plugin
{
    static public function run()
    {
        self::preInit();

        // on accroche une méthode pour gérer l'init
        add_action('init', [self::class, 'onInit']);

        // à l'init de l'api REST
        add_action('rest_api_init', [self::class, 'onRestInit']);

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

    static public function PreInit()
    {
        Tutorials::run();
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
     * Regroups all the actions to perform on WordPress rest_api_init hook
     *
     * @return void
     */
    static public function onRestInit()
    {
        
        remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
        add_filter('rest_pre_serve_request', [self::class, 'setupCors']);
        
        Register::initRoute();

        // ajout du champ "metadata" qui contient toutes les méta pour un post
        register_rest_field(
            'post',
            'metadata',
            [
                'get_callback' => function ($data) {
                    return get_post_meta($data['id'], '', '');
                }
            ]
        );
    }

    /**
     * setupCors()
     * filters the Cross Origin Policy
     *
     * @return void
     */
    static public function setupCors()
    {
        header('Access-Control-Allow-Origin: *');
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
