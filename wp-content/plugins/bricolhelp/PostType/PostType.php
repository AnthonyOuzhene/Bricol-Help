<?php

namespace bricolHelp\PostType;

class PostType
{
    /**
     * Register a new Custom Post Type
     *
     * @return void
     */
    static public function register()
    {
        // On utilise le hook register_post_type() pour enregistrer un nouveau CPT dans le backoffice de WordPress
        register_post_type(
            // on veut récupérer la constante POST_TYPE_KEY définie sur la classe fille avec static::
            static::POST_TYPE_KEY, // handle 
            [
                'label' => static::POST_TYPE_LABEL, // donne un nom d'affichage à notre CPT
                'public' => true, // gère la visibilité du CPT
                'has_archive' => true, // ce CPT aura-t-il une page d'archive => une liste de tutos
                'rewrite' => ['slug' => static::POST_TYPE_SLUG], // à chaque fois qu'on change cette valeur (ou à la création du CPT) il faut régénerer les permaliens depuis le backoffice
                'capabilities' => static::CAPABILITIES, // on définit le NOM des capabilities qui sont utilisées par ce CPT
                'supports' => [
                    'title', // Ce CPT gerera les titres
                    'editor', // ce CPT gerera l'éditeur de texte
                    'thumbnail', // On autorise l'utilisation des images misent en avant
                    'author', // ce custom post type utilisera les auteurs
                    'comments', // ce CPT gérera les commentaires
                ],
                'show_in_rest' => true,
            ]
        );
    }

    /**
     * Automatically attach current CPT custom caps to default roles
     *
     * @return void
     */
    static public function addCaps()
    {
        // pour chaque rôle défini dans la liste des rôles custom pour le CPT courant
        foreach (static::DEFAULT_ROLES_CAPS as $roleSlug => $capsArray) {
            // on utilise la fonction get_role pour récupérer le role courant
            $currentRole = get_role($roleSlug);

            // pour chaque capability custom dans ce CPT, on l'ajoute au role courant
            foreach ($capsArray as $cap => $grant) {
                // on peut associer une cap à un role avec WP_Role::add_cap()
                $currentRole->add_cap($cap, $grant);
            }
        }
    }

    /**
     * Automatically detach current CPT custom caps from default roles
     *
     * @return void
     */
    static public function removeCaps()
    {
        // pour chaque rôle défini dans la liste des rôles custom pour le CPT courant
        foreach (static::DEFAULT_ROLES_CAPS as $roleSlug => $capsArray) {
            // on utilise la fonction get_role pour récupérer le role courant
            $currentRole = get_role($roleSlug);

            // pour chaque capability custom dans ce CPT, on la retire du role courant
            foreach ($capsArray as $cap) {
                // on peut associer une cap à un role avec WP_Role::add_cap()
                $currentRole->remove_cap($cap);
            }
        }
    }
}
