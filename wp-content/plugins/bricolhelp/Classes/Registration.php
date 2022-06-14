<?php

namespace bricolHelp\Classes;

use bricolHelp\Role\AdvancedRole;
use bricolHelp\Role\ProfessionalRole;

class Registration
{
    static public function init()
    {
        // On déclenche le hook "register_form" à l'init pour afficher des champs custom lors de l'inscription dans le backoffice
        add_action('register_form', [self::class, 'displayCustomFields']);

        // A la validation du formulaire, on déclenche 
        add_filter('registration_errors', [self::class, 'validateCustomFields']);

        // quand WP vient d'enregistrer le nouvel utilisateur, on déclenche  userRegistered
        add_action('user_register', [self::class, 'userRegistered']);
    }

    static public function displayCustomFields()
    {
        // require du template register-form.php
        // BRICOLHELP_TEMPLATES_DIR est définie dans bricolhelp.php
        require BRICOLHELP_TEMPLATES_DIR . '/register-form.tpl.php';
    }

    static public function validateCustomFields($errors)
    {

        // on fait la validation des champs :

        // ROLE 
        define('BRICOLHELP_ERROR_CODE_PREFIX', 'bricolhelp-registration-');
        // on vérifie que le rôle sélectionné fait partie de la liste des rôles possibles
        if (!in_array($_POST['user_role'], [
            AdvancedRole::ROLE_KEY, ProfessionalRole::ROLE_KEY
        ])) {
            // si le rôle saisi n'est pas dans ce [], on ajoute une erreur dans l'objet $error
            $errors->add(OPROFILE_ERROR_CODE_PREFIX . 'wrong-role', __("<strong>Erreur</strong>: Le rôle sélectionné n'est pas valide."));
        }

        // PASSWORD
        // Vérification que mot de passe = mot de passe confirmé
        if (
            empty($_POST['user_password_confirm']) ||
            $_POST['user_password_confirm'] !== $_POST['user_password']
        ) {
            $errors->add('user_password_confirmed_error', __('<strong>Erreur</strong>: Veuillez saisir la confirmation du mot de passe.'));
        }
        // FIRST NAME & LAST NAME
        if (empty($_POST['user_firstname'])) {
            $errors->add('user_first_name_error', __('<strong>Erreur</strong>: Veuillez saisir un prénom.'));
        }

        if (empty($_POST['user_lastname'])) {
            $errors->add('user_name_error', __('<strong>Erreur</strong>: Veuillez saisir un nom.'));
        }

        return $errors;
    }

    /**
     * userRegistered
     * 
     * Triggers when the user has been created by WP
     * 
     * @param int $userId
     *
     * @return void
     */
    static public function userRegistered($userId)
    {
        // on peut associer à l'utilisateur fraîchement créé les données saisies dans le form : password, role...

        // il faut associer le rôle sélectionné à l'utilisateur fraîchement créé
        // récupérer l'objet WP_User correspondant
        $newUser = get_userdata($userId);
        // si on échoue à le récupérer, on arrête tout
        if ($newUser === false) {
            return;
        }

        // on associe le rôle à $newUser
        $newUser->add_role($_POST['user_role']);

        // avec wp_update_user() on peut modifier les données d'un utilisateur. On fournit un tableau associatif en argument pour passer les données à l'utilisateur, il faut fournir l'id de l'utilisateur à modifier dans ce tableau associatif pour cibler l'utilisateur à modifier.
        // ici on est toujours dans la requête de soumission du formulaire => les données sont toujours accessbiles dans $_POST
        wp_update_user([
            'ID' => $userId,
            'user_pass' => $_POST['user_password'],
            'first_name' => $_POST['user_firstname'],
            'last_name' => $_POST['user_lastname'],
        ]);
    }
}
