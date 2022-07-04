<?php

namespace bricolHelp\User;

class Register
{

    static public function initRoute()
    {
        // on utilise register_rest_route pour définir une nouvelle route
        // on peut préciser pour quelle méthode HTTP (verbe) et quel sera le callback => la méthode à déclencher pour cette route
        // l'argument 1 contient le namespace dans lequel créer la route
        register_rest_route('bricolhelp/v1', '/user', [
            'methods' => 'POST',
            'callback' => [self::class, 'handleRegistration'],
        ]);
    }

    static public function handleRegistration()
    {

        $postData = json_decode(file_get_contents("php://input"), true);     
        
        $userIdOrErrorObject = wp_create_user(
            $postData['username'],
            $postData['firstname'],
            $postData['lastname'],
            $postData['password'],
            $postData['email']
        );

        // si on a reçu un int
        if (is_int($userIdOrErrorObject)) {
            $response = ["userId" => $userIdOrErrorObject];
        } else {
            // sinon c'est une erreur
            $response = $userIdOrErrorObject;
        }

        // on renvoie la réponse au format JSON
        return $response;

  
    }
}
