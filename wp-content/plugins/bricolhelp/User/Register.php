<?php

namespace Bricolhelp\User;

class Register
{
    static public function initRoute()
    {
        register_rest_route('bricolhelp', '/user' , [
            'methods' => 'POST' ,
            'callback' => [self::class, 'handleRegistration'],
        ]);
    }
    static public function handleRegistration()
    {
       $postData = json_decode(file_get_contents("php//input"), true);
    
       $userIdOrErrorObject = wp_create_user(
        $postData['username'],
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

