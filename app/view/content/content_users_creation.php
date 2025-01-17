<?php

$session = $_SESSION['Roles'];


if ((is_int(strpos($session, 'Administateur')) || (is_int(strpos($session, 'Moderateur'))))) {
?>
    <a href="<?= BASE_URL ?>users" class="mb-2 mt-4 ml-5">Utilisateurs </a>><a class="mb-2 mt-4"> Création</a>

    <div class="container">
        <form action="<?php echo (BASE_URL) ?>users/creation" method="POST">
            <div class="row mt-3">

                <div class="col">
                    <h1>Création d'un utilisateur</h1>

                    <p class="mt-5">Nom</p><br>
                    <input type="text" class="w-75" name="userLastname" required>

                    <p class="mt-5">Prénom</p><br>
                    <input type="text" class="w-75" name="userFirstname" required>

                    <p class="mt-5">Adresse</p><br>
                    <input type="text" class="w-75" name="userAdress1" required>

                    <p class="mt-5">Adresse</p><br>
                    <input type="text" class="w-75" name="userAdress2">

                    <p class="mt-5">Code postal</p><br>
                    <input type="text" class="w-75" name="userZipCode" required>
                    <?php if (isset($zipcodeError)) {
                        echo ' <div class="alert alert-danger text-center" role="alert">Erreur de code postal</div>';
                    }; ?>
                    <p class="mt-5">Ville</p><br>
                    <input type="text" class="w-75" name="userTown" required>


                    <p class="mt-5">Rôle</p><br>
                    <input id="Chef" type="checkbox" class="w-75" name="roleChef"><label for="Chef">Chef</label>
                    <input id="Moderator" type="checkbox" class="w-75" name="roleModerator"><label for="Moderator">Moderateur</label>
                    <input id="Admin" type="checkbox" class="w-75" name="roleAdmin"><label for="Admin">Administateur</label>
                    <p class="mt-5">Etat</p><br>
                    <div>
                        <input type="radio" id="actif" name="State" value="actif">
                        <label for="actif">actif</label>
                    </div>

                    <div>
                        <input type="radio" id="wait" name="State" value="wait" checked>
                        <label for="wait">wait</label>
                    </div>

                    <div>
                        <input type="radio" id="block" name="State" value="block">
                        <label for="block">block</label>
                    </div>
                    <!-- CA -->
                    <div class="row">
                        <div class="d-flex justify-content-center p-2">
                            <button type="submit" class="btn m-10 ml-2 valid w-50">Valider</button>
                            <button type="submit" class="btn m-10 ml-5 cancel w-50">Annuler</button>
                        </div>
                    </div>
                </div>

                <div class="col mt-5">
                    <p class="mt-5">Login <i class="badge">(commencer par une majuscule)</i></p><br>
                    <input type="text" class="w-75" name="userLogin" required>
                    <?php if (isset($loginError)) {
                        echo ' <div class="alert alert-danger text-center" role="alert">Login sans majuscule</div>';
                    }; ?>

                    <?php if (isset($loginErrorExist)) {
                        echo ' <div class="alert alert-danger text-center" role="alert">Deja existant</div>';
                    }; ?>

                    <p class="mt-5">Email</p><br>
                    <input type="text" class="w-75" name="userEmail" required>
                    <?php if (isset($emailError)) {
                        echo ' <div class="alert alert-danger text-center" role="alert">Erreur dans la structure de email</div>';
                    }; ?>
                    <?php if (isset($emailErrorExist)) {
                        echo ' <div class="alert alert-danger text-center" role="alert">Email existant</div>';
                    }; ?>

                    <p class="mt-5">Mot de passe</p><br><input type="password" class="w-75" name="userPwd" id="pwd" required>
                    &nbsp;<br><br>Complexité du mot de passe : <meter value="0" low="2" high="4" optimum="5" min="0" max="5" id="pwd_meter">0%</meter><br>

                    <ul>
                        <li><span class="advice mr-5"><em><b>Conseils pour le mot de passe (Tous les lignes ci-dessous
                                        doivent être vertes).</b></em></span></li>
                        <li><span class="advice mr-5" id="pwd_warn1">Le mot de passe doit faire plus de 8 caractères.</span>
                        </li>
                        <li><span class="advice" id="pwd_warn2">Le mot de passe doit contenir au moins une lettre
                                minuscule.</span></li>
                        <li><span class="advice" id="pwd_warn3">Le mot de passe doit contenir au moins une lettre
                                majuscule.</span></li>
                        <li><span class="advice" id="pwd_warn4">Le mot de passe doit contenir au moins un chiffre.</span>
                        </li>
                        <li><span class="advice" id="pwd_warn5">Le mot de passe doit contenir au moins un caractère
                                non-alphanumérique.</span></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>

<?php

} else {
    include_once PATH_ERROR . '403.php';
}

?>