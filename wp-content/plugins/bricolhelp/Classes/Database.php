<?php

namespace bricolHelp\Classes;

class Database
{
    /**
     * generateTables
     *
     * Creates the custom mysql tables for oProfile
     * 
     * @return void
     */
    static public function generateTables()
    {
        global $wpdb;

        $tableName = $wpdb->prefix . 'tutorials';
        $tablePost = $wpdb->prefix . 'posts';

        // on récupère le jeu de caractère géré par la base
        $charsetCollate = $wpdb->get_charset_collate();

        // écrire la requête à exécuter
        $sql = "
            CREATE TABLE IF NOT EXISTS `{$tableName}` (
                `tutorial_id` BIGINT(20) PRIMARY KEY NOT NULL UNSIGNED AUTO_INCREMENT,
                `rating` TINYINT(1) NOT NULL UNSIGNED DEFAULT 1,
                `estimated_time` TIME NOT NULL UNSIGNED,
                `post_id` BIGINT(20) NOT NULL UNSIGNED,
                FOREIGN KEY (`post_id`) REFERENCES " . $tablePost . " (`id`)
            ) {$charsetCollate};
        ";

        // on utlise l'objet wpdb pour faire la requête
        $wpdb->query($sql);
    }
}
