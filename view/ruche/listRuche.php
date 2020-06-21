<?php $title = 'liste des ruches'; ?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a type="button" class="btn btn-success" href="index.php?action=addRuches">
                Ajouter une ruche
            </a>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h3>Liste des Ruches</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                    foreach ($listRuches as $key=>$data) :
                    ?>
                            <tr>
                                <td><?= $data->getName() ?></td>
                                <td><?= $data->getLatitude() ?></td>
                                <td><?= $data->getLongitude() ?></td>
                                <td>

                                    <a  href="index.php?action=addInformation&amp;id=<?=  $data->getId() ?>"  title="Ajouter une information" type="button" class="btn btn-success btn-sm" >
                                        <i class="ion-ios-plus-outline" style="font-size: 20px;"></i>
                                    </a>


                                    <a  type="button" class="btn btn-info btn-sm"  href="index.php?action=updateRuche&amp;id=<?=  $data->getId() ?>"
                                        data-toggle="tooltip" data-placement="top" title="Modifier"><i class="ion-edit"
                                            style="font-size: 20px;"></i></a>

                                    <button  type="button" class="btn btn-danger btn-sm btn_delete" id=<?=  $data->getId() ?>>
                                        
                                        <i   data-toggle="tooltip modal" data-placement="top" title="Supprimer"
                                            class="ion-trash-a " style="font-size: 20px;"></i>
                                    </button>

                                </td>

                            </tr>
                        <input type="hidden" name="id_r">
                            <?php
                    endforeach;
                    ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


</div>



<!-- Modal -->
<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppresion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?action=deleteRuche" method="post">
                <div class="modal-body">
                    Voulez vous supprimer cette ligne?
                    <input type="hidden" name="ruche_delete" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>