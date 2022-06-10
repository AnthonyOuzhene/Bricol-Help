<?php

namespace bricolHelp\Classes;

class Registration
{
    static public function init()
    {
        // On déclenche le hook "register_form" à l'init pour afficher des champs custom lors de l'inscription dans le backoffice
        add_action('register_form', [self::class, 'displayCustomFields']);
    }

    static public function displayCustomFields()
    {
        // require du template register-form.php
        // BRICOLHELP_TEMPLATES_DIR est définie dans bricolhelp.php
        require BRICOLHELP_TEMPLATES_DIR . '/register-form.tpl.php';
    }
}
