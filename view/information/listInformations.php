<?php $title = 'liste des informations'; ?>
<?php ob_start(); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3> Liste des Informations</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ruche</th>
                                <th>Date</th>
                                <th>Temperature</th>
                                <th>Poids</th>

                                <th>Humidité</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                        while ($info = $listInformation->fetch())
                        {
                        ?>
                            <tr>
                                <td><?= $info['name'] ?></td>
                                <td><?= $info['comment_date_fr'] ?></td>
                                <td><?= $info['temperature'] ?></td>
                                <td><?= $info['weight'] ?></td>
                                <td><?= $info['humidity'] ?></td>
                                <td><a type="button" class="btn btn-info btn-sm" href="index.php?action=updateFormInfo&amp;id=<?=  $info['info_id'] ?>"><i class="ion-edit" style="font-size: 20px;"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm btn_delete-info"  id=<?= $info['info_id']?> >
                                        <i class="ion-trash-a" style="font-size: 20px;"></i>
                                    </button>
                                   
                                </td>
                                   

                            </tr>

                            <?php
                        }
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
            <form action="index.php?action=deleteInformation" method="post">
                <div class="modal-body">
                    Voulez vous supprimer cette ligne?
                    <input type="hidden" name="info_delete" id="product_code_delete" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
        </d <?php $content = ob_get_clean(); ?> <?php require('view/template.php'); ?>