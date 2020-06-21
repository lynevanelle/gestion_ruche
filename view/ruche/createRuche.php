<?php $title = 'Ajouter un ruche '; ?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">

        <div class="col-12">
         <?php   if (isset($message)) // On a un message à afficher ?
            {
            echo '<p>', $message, '</p>'; // Si oui, on l'affiche.

            }?>
            <div class="card">
                <div class="card-header">
                    <h3 class="modal-title" id="exampleModalLiveLabel">Ajouter une nouvelle ruche</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?action=saveRuche" method="post">

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nameRuche">Nom</label>
                                <input name="name" type="text" class="form-control" id="nameRuche"
                                    placeholder="Nom de la ruche">
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input name="longitude" type="text" class="form-control" id="longitude"
                                    placeholder="Longitude">
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input name="latitude" type="text" class="form-control" id="latitude"
                                    placeholder="Latitude">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <br>


</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>