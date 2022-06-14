<?php

namespace bricolHelp\Role;

class AdvancedRole extends Role
{
        // définition des éléments spécifiques
        const ROLE_KEY = "advanced";
        const ROLE_DISPLAY_NAME = "Bricoleur avancé";
        const CAPABILITIES = [
            'edit_others_tutorials' => true,
            'read' => true, 
            'edit_posts' => true,
            'edit_tutorials' => true,
            'publish_tutorials' => false,
            'edit_tutorial' => true,
            'read_tutorial' => true,
            'delete_tutorial' => false,
            'manage_tools' => true,
            'edit_tools' => true,
            'manage_materials' => true,
            'edit_materials' => true,
            'assign_materials' => true,
            'manage_category_types' => true,
            'assign_category_types' => true,
            'edit_category_types' => true,
            'upload_files' => true,
            'edit_published_tutorials' => true
        ];
            
}
