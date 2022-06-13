<?php

namespace bricolHelp\Api;

use bricolHelp\PostType\TutorialsPostType;

class Tutorials
{

    /**
     * run()
     * starts the Tutorial related Api customization
     *
     * @return void
     */
    static public function run()
    {
        $postType = TutorialsPostType::POST_TYPE_KEY;
        // au moment où WP prépare la réponse pour notre CPT Tutorial, on ajoute des données qui nous intéressent
        add_filter("rest_prepare_{$postType}", [self::class, "onPrepare"]);
    }

    /**
     * onPrepare()
     * filters the WordPress Rest Api response for the Tutorial resource
     *
     * @param [type] $response
     * @return void
     */
    static public function onPrepare($response)
    {
        // $response contient la réponse que WP a prévu de renvoyer
        // dans $response, on trouve la propriété "data" qui est un array associatif dans lequel on peut placer des données
        // wp_trim_excerpt() => sans argument précisé, cette fonction récupère l'extrait pour le post courant (en le générant depuis le contenu si besoin). Dans ce filtre, chaque post utilisé pour gérer la requête
        // strip_tags() pour supprimer le HTML qui pourrait s'y trouver

        $response->data['excerpt'] = strip_tags(wp_trim_excerpt());
        $response->data['content'] = strip_tags(wp_trim_excerpt());

        // on ajoute l'url du thumbnail => image mise en avant, dans un format réduit
        $response->data['thumbnail'] = get_the_post_thumbnail_url();

        // on est dans un filter, on doit donc retourner une valeur
        return $response;
    }
}
