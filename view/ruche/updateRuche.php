<?php $title = 'Ajouter un ruche '; ?>
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="modal-title text-center" >Modifier une ruche<?= $OneRuche->getName() ?></h3>
                        </div>
                        <div class="card-body">
                        <form action="index.php?action=updatesRuche" method="post">
                  
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nameRuche">Nom</label>
                            <input name="id" type="hidden" value=<?= $OneRuche->getId() ?>>

                            <input type="text" name="name" value="<?= $OneRuche->getName() ?>"   class="form-control" id="nameRuche" placeholder="Nom de la ruche">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input value=<?= $OneRuche->getLongitude() ?> name="longitude" type="text" class="form-control" id="longitude" placeholder="Longitude">
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input value=<?= $OneRuche->getLatitude() ?> name="latitude" type="text" class="form-control" id="latitude" placeholder="Latitude">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
                        </div>
                    </div>
               

            </div>
        </div>
        <br>


    </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>