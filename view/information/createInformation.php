<?php $title = 'Ajouter une information'; ?>
<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="modal-title" id="exampleModalLiveLabel">Information </h3>
                </div>
                <div class="card-body">
                <form action="index.php?action=saveInformation" method="post">
                   
                    <div class="modal-body">
                        <div class="form-group">
                        <input value=<?= $_GET['id'] ?> type="hidden" name="ruche_id">
                            <label for="weight">Poids</label>
                            <input name="weight" type="text" class="form-control" id="weight" placeholder="Poids">
                        </div>
                        <div class="form-group">
                            <label for="humidity">Humidité</label>
                            <input name="humidity" type="text" class="form-control" id="humidity" placeholder="Humidité">
                        </div>

                        <div class="form-group">
                            <label for="temperature">Température</label>
                            <input name="temperature" type="text" class="form-control" id="temperature" placeholder="Température">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
                </div>
            </div>
            

            </div>
        </div>
    </div>

   

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>