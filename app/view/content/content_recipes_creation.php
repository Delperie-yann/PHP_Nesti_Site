<?php

$session = $_SESSION['Roles'];

if ((is_int(strpos($session, 'Administateur')) || (is_int(strpos($session, 'Chef'))))) {
?>
    <?php if (isset($recipeName)) {
        echo '<div class="alert alert-danger text-center" role="alert">Erreur saisie nom</div>';
    }; ?>
    <?php if (isset($recipedifficult)) {
        echo ' <div class="alert alert-danger text-center" role="alert">Erreur saisie difficulté</div>';
    }; ?>
    <?php if (isset($recipePortion)) {
        echo ' <div class="alert alert-danger text-center" role="alert">Erreur saisie portion</div>';
    }; ?>
    <?php if (isset($recipeTimePrepare)) {
        echo ' <div class="alert alert-danger text-center" role="alert">Erreur saisie temps de preparation</div>';
    }; ?>



    <div class="container bg-white d-flex flex-column align-items-left" id="recettes">
        <div class="row mt-3">
            <form action="<?php echo (BASE_URL) ?>recipes/create" method="POST">
                <div class="col">
                    <h1 class="mb-2 mt-4">Création d'une recette</h1>
                    <p class="mt-4">Nom de la recette</p>
                    <input type="text" class="w-100" name="recipeName">

                    <p class="mt-3">Auteur de la recette : <?= print_r($_SESSION["firstname"] . " " . $_SESSION["lastname"]) ?></p>
                    <div class="row">
                        <div class="col d-flex justify-content-between flex-column">
                            <p class="mt-4 mb-2">Difficulté (note sur 5)</p>

                            <p class="mt-4 mb-2">Nombre de personnes max 9</p>

                            <p class="mt-4 mb-2">Temps de préparation</p>

                        </div>
                        <div class="col">
                            <div class="col d-flex justify-content-between flex-column p-0">
                                <div class="d-flex justify-content-end"><input type="number" min="0" max="5" name="recipedifficult" class="w-50 mt-4 mb-2" ></div>
                                <div class="d-flex justify-content-end"><input type="number" min="0" max="10" name="recipePortion" class="w-50 mt-4 mb-2" ></div>
                                <div class="d-flex justify-content-end"><input type="time"  name="recipeTimePrepare" class="w-50 mt-4 mb-2" ></div>
                            </div>
                        </div>
                    </div>
                    <?php if (is_int(strpos($session, 'Chef'))){ ?> 
                    <div class="d-flex justify-content-center p-2">
                        <button type="submit" class="btn m-5 valid w-25">Valider</button>
                       
                    </div>
                    <?php }; ?>
                </div>
            </form>
<!-- 
            <div class="col">
                <form enctype="multipart/form-data" action="<?= BASE_URL ?>recipes/addImage" method="post">
                    <div class="mt-2 h-75 w-100 d-flex justify-content-center align-items-center" id="imgCtn" >
                        <img src="" alt="" id="img" class="maxpict" >
                    </div>
                    <div class="row">
                        <div class="mb-5">
                            <label for="formFile" class="form-label"></label>
                            <input class="form-control ml-5" type="file" id="formFile" name="pictures">
                        </div>
                        <div class="col-sm-2 ml-5 mt-2"><button type="submit" class="btn valid w-100" onclick="dlImg()">Ok</button></div>
                    </div>
                </form>
            </div> -->
        </div>
        </div>
        <!-- 
    <div class="recipeCtn h-100">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col">
                        <h2>Préparations</h2>
                    </div>
                </div>
                <div id="prepCtn">
                    <div class="row prepItem mb-5" id="baseItem" data-order="1">
                        <div class="col-sm-1">
                            <button class="upText btn mt-2 mb-2 d-flex justify-content-center" >
                                <img src="<?= BASE_URL ?>public/images/up-arrow.png" alt="">
                            </button>
                            <button class="downText btn mt-2 mb-2 d-flex justify-content-center" >
                                <img src="<?= BASE_URL ?>public/images/down-arrow.png" alt="">
                            </button>
                            <button class="deleteText btn mt-2 mb-2 d-flex justify-content-center" >
                                <img src="<?= BASE_URL ?>public/images/delete.png" alt="">
                            </button>
                        </div>
                        <div class="col">
                            <textarea class="prepText w-100 h-100"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 h-50">
                    <div class="col-sm-1"></div>
                    <div class="col">
                        <button class="btn w-100" >
                            <img src="<?= BASE_URL ?>public/images/addinput.png" alt="Ajouter zone de texte">
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h2>Liste des ingrédients</h2>
                <div class="ingredientsCtn" id="ingCtn">
                </div>
                <p class="mt-2 mb-2">Ajouter un ingrédient</p>
                <input type="text" id="ingName" class="mb-2 w-100" style="height: 38px;">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text"  id="ingQty" class="w-100 h-100">
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="ingUnit" class="w-100 h-100">
                    </div>
                    <div class="col-md-2 d-flex justify-content-end">
                        <button type="submit" class="btn valid" >Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
    <?php

} else {
    include_once PATH_ERROR . '403.php';
}

    ?>