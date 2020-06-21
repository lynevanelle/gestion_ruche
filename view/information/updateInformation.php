<?php $title = 'Ajouter une information'; ?>
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="modal-title" id="exampleModalLiveLabel"> Modifier de  l'information de la ruche  <span class="text-danger"><?= $OneInfos['name'] ?></span> </h3>
                </div>
                <div class="card-body">
                <form action="index.php?action=updateInfo" method="post">
                   
                    <div class="modal-body">
                        <div class="form-group">
                        <input value=<?= $OneInfos['info_id'] ?> type="hidden" name="info_id">
                            <label for="weight">Poids</label>
                            <input value=<?= $OneInfos['weight'] ?> name="weight" type="text" class="form-control" id="weight" placeholder="Poids">
                        </div>
                        <div class="form-group">
                            <label for="humidity">Humidité</label>
                            <input value=<?= $OneInfos['humidity'] ?> name="humidity" type="text" class="form-control" id="humidity" placeholder="Humidité">
                        </div>

                        <div class="form-group">
                            <label for="temperature">Température</label>
                            <input value=<?= $OneInfos['temperature'] ?> name="temperature" type="text" class="form-control" id="temperature" placeholder="Température">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
                </div>
            </div>
            

            </div>
        </div>
    </div>

   

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>