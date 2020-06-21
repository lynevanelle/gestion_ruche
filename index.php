<?php
require('controller/controller.php');
/**
 * Routage
 */
try{

    if (isset($_GET['action'])) {
        switch ($_GET['action'])
        {
            case 'ruches':

                listRuches();
                break;
            case 'addRuches':
                addRuches();
                break;
            case 'saveRuche':
                if (!empty($_POST['name']) && !empty($_POST['longitude'])& !empty($_POST['latitude'])) {
                    $dataRuche=array(
                        "name"=>$_POST['name'],
                        "longitude"=>$_POST['longitude'],
                        "latitude"=>$_POST['latitude']
                    );
                    addRuche($dataRuche);
                }
                else {
                    $message='Tous les champs ne sont pas remplis !';
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
                break;
            case 'addInformation':
                addInformation();


                break;
            case 'saveInformation':
                if (isset($_POST['ruche_id']) && $_POST['ruche_id'] > 0) {
                    if (!empty($_POST['weight']) && !empty($_POST['humidity'])& !empty($_POST['temperature'])) {
                        $dataInformation=array(
                            "weight"=>$_POST['weight'],
                            "humidity"=>$_POST['humidity'],
                            "temperature"=>$_POST['temperature'],
                            "ruche_id"=>$_POST['ruche_id']
                        );
                        saveInformation($dataInformation);
                    }else{
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }

                }else{

                    throw new Exception('Aucun identifiant de ruche envoyée');
                }

                break;
            case 'listeInformation':
                listInformation();
                break;
            case 'addInformation':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    addInformation();
                }else{
                    throw new Exception('Aucun identifiant de ruche envoyée');
                }
                break;
            case 'updateRuche':

                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    updateRuche($_GET['id']);
                }else{
                    throw new Exception('Aucun identifiant de ruche envoyée');
                }
                break;
            case 'updateRuche':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    updateRuche($_GET['id']);
                }else{
                    throw new Exception('Aucun identifiant de ruche envoyée');
                }

                break;
            case 'updatesRuche':
                if (isset($_POST['id']) &&$_POST['id'] > 0) {
                    $dataRuche=array(
                        "name"=>$_POST['name'],
                        "longitude"=>$_POST['longitude'],
                        "latitude"=>$_POST['latitude'],
                        "id"=>$_POST['id']
                    );

                    updateOneRuche($dataRuche);
                }else{
                    throw new Exception('Aucun identifiant de ruche envoyée');
                }

                break;
            case 'updatesRuche':
                if (isset($_POST['id']) &&$_POST['id'] > 0) {
                    $dataRuche=array(
                        "name"=>$_POST['name'],
                        "longitude"=>$_POST['longitude'],
                        "latitude"=>$_POST['latitude'],
                        "id"=>$_POST['id']
                    );

                    updateOneRuche($dataRuche);
                }else{
                    throw new Exception('Aucun identifiant de ruche envoyée');
                }

                break;
            case 'updatesRuche':
                if (isset($_POST['id']) &&$_POST['id'] > 0) {
                    $dataRuche=array(
                        "name"=>$_POST['name'],
                        "longitude"=>$_POST['longitude'],
                        "latitude"=>$_POST['latitude'],
                        "id"=>$_POST['id']
                    );

                    updateOneRuche($dataRuche);
                }else{
                    throw new Exception('Aucun identifiant de ruche envoyée');
                }

                break;

            case 'updateInfo':
                if (isset($_POST['info_id']) &&$_POST['info_id'] > 0) {
                    $dataInfo=array(
                        "weight"=>$_POST['weight'],
                        "humidity"=>$_POST['humidity'],
                        "temperature"=>$_POST['temperature'],
                        "id"=>$_POST['info_id']
                    );

                    updateOneInfo($dataInfo);
                }else{
                    throw new Exception('Aucun identifiant d\'information envoyée');
                }
                break;
            case 'updateFormInfo':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    updateFormInfo($_GET['id']);
                }else{
                    throw new Exception('Aucun identifiant d\'information envoyée');
                }

                break;
            case 'deleteRuche':
                if (isset($_POST['ruche_delete']) &&$_POST['ruche_delete'] > 0) {
                    deleteRuche($_POST['ruche_delete']);
                }else{
                    throw new Exception('Aucun identifiant de ruche envoyée');
                }
                break;
            case 'deleteInformation':
                if (isset($_POST['info_delete']) &&$_POST['info_delete'] > 0) {
                    deleteInformation($_POST['info_delete']);
                }else{
                    throw new Exception('Aucun identifiant de information envoyée');
                }

        }
    }else{
        home();
    }
}catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}