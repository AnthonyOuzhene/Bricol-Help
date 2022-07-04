<?php

use bricolHelp\Role\AdvancedRole;
use bricolHelp\Role\ProfessionalRole;
?>
<p>
    <label for="user_role">Choisissez votre degré de bricolitude !</label>
    <select id="user_role" name="user_role" class="input">
        <option value="">--Choisissez un rôle--</option>
        <option value="<?= AdvancedRole::ROLE_KEY; ?>"><?= AdvancedRole::ROLE_DISPLAY_NAME; ?></option>
        <option value="<?= ProfessionalRole::ROLE_KEY; ?>"><?= ProfessionalRole::ROLE_DISPLAY_NAME; ?></option>
    </select>
</p>
<p>
    <label for="user_firstname">Prénom</label>
    <input type="text" name="user_firstname" id="user_firstname" class="input" value="">
</p>
<p>
    <label for="user_lastname">Nom</label>
    <input type="text" name="user_lastname" id="user_lastname" class="input" value="">
</p>
<p>
    <label for="user_password">Mot de passe</label>
    <input type="password" name="user_password" id="user_password" class="input" value="">
</p>
<p>
    <label for="user_password_confirm">Confirmez votre mot de passe</label>
    <input type="password" name="user_password_confirm" id="user_password_confirm" class="input" value="">
</p>