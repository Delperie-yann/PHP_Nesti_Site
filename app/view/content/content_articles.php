

<?php

?>

<h1 class="mb-2 mt-4 ml-5">Articles</h1>
<div class="container bg-white d-flex flex-column align-items-left" id="articles">
  <div class="d-flex flex-row justify-content-between">
    <nav class="navbar navbar-white bg-white pl-0">
      <form class="form-inline">
        <input class="form-control mr-sm-2" id="customSearch" type="search" placeholder="" aria-label="Search">
        <img id="searchRecipe" src="<?php BASE_URL ?>public/images/search.png" alt="" width="20px" height="25px">
      </form>
    </nav>
    <div>
      <a href="<?php BASE_URL ?>index.php?loc=articles&action=orders" class="btn mb-1 border align-self-end bg-warning"><i class="far fa-eye mr-3"></i> Commandes</a>
    </div>
    <div>
      <a href="<?php BASE_URL ?>index.php?loc=articles&action=importation" class="btn mb-1 border align-self-end"><img id="ajouter" src="<?php BASE_URL ?>public/images/add.png" alt="" width="20px" height="20px"> Importer</a>
    </div>
  </div>

<table class="table">
<thead>
  <tr class="bg-info text-white">
    <th scope="col">ID</th>
    <th scope="col">Nom</th>
    <th scope="col">Prix de vente</th>
    <th scope="col">Type</th>
    <th scope="col">Dernière importation</th>
    <th scope="col">stock</th>
    <th scope="col">Actions</th>
  </tr>


<?php
foreach($arrayArticles as $value){


?>

  <tr>
    <th scope="row"><?=$value->getId();?></th>
    <td><?=$value->getUnitQuantity();?> <?=$value->getUnit();?> <?=$value->getName();?></td>
    <td><?=$value->getPrice();?></td>
    <td>Ingredients</td>
    <td><?=$value->getImportationDate();?></td>
    <td><?=$value->getQuantStock();?></td>
    <td><a href="<?=BASE_URL?>index.php?loc=articles&action=editing">Modifier</a><br>
    <a data-toggle="modal" href="#myModal<?=$value->getId();?>">Supprimer</a>
    <div class="container">
  	<div class="row">
    
    
    	<div id="myModal<?=$value->getId();?>" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
 
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <p class="modal-body">  <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>Voulez vous vraiment supprimer <?=$value->getId();?> ?</p>
                </div>
                <div class="modal-body">
                  
                    <p>Cette action est définitive</p>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                      <button class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Confirmer</button>
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                       
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
    

  </td>
  </tr>
  <?php
}

  ?>
 </table>
</tbody>
