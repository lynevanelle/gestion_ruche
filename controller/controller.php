<?php

// Chargement des classes
require_once('model/RucheManager.php');
require_once('model/InformationManager.php');

/**
 * function qui permet d'afficher la page d'accueil
 *
 */

function home(){
    require('view/home.php');
}
/**
 * function qui permet d'afficher la liste des ruches
 *
 */

function listRuches()
{
    $ruchesManager=new RucheManager();
    $listRuches= $ruchesManager->getList();

    require('view/ruche/listRuche.php');
}

/**
 * function qui permet d'afficher le formulaire pour ajouter une ruche
 */

function addRuches(){
    require('view/ruche/createRuche.php');
}


/**
 * function qui permet d'enregistrer une nouvelle ruche
 * @param array $dataRuche
 * @throws Exception
 */

function addRuche(array $dataRuche)
{

    $ruche = new Ruche($dataRuche);
    $ruchesManager=new RucheManager();
    $affectedLines = $ruchesManager->add($ruche);
    if (!$affectedLines) {
        throw new Exception('Impossible d\'ajouter une ruche !');
    }
    else {
        header('Location: index.php?action=ruches');
    }
}

/**
 * function  qui permet de supprimer une  ruche
 * @param int $id
 * @throws Exception
 */

function deleteRuche(  $id){
    $rucheManger=new RucheManager();
    $affectedLines = $rucheManger->delete($id);
    if (!$affectedLines) {
        throw new Exception('Impossible d\'effectuer cette suppresion !');
    }
    else {
        header('Location: index.php?action=ruches');
    }
}

/**
 * function qui permet de modifier une ruche
 * @param array $dataRuche
 * @throws Exception
 */

function updateOneRuche(array $dataRuche){
    $ruche = new Ruche($dataRuche);
    $ruchesManager=new RucheManager();


    $affectedLines = $ruchesManager->update($ruche);
    if (!$affectedLines) {
        throw new Exception('Impossible de modifier cette ruche !');
    }
    else {
        header('Location: index.php?action=ruches');
    }

}


/**
 * function qui permet d'afficher le formulaire de modification
 *
 */
function updateRuche($id){

    $rucheManager=new RucheManager();
    $OneRuche = $rucheManager->get($id);

    require('view/ruche/updateRuche.php');
}


/**
 * function qui permet d'afficher le formulaire pour modifier une information
 *
 */

/**
 * encours de developpemnt
 */
function verifiedDate(){
    $info=isValid($_POST['id']);
    $date_create=new DateTime( $info->getCreate_at());
    $current_date=new DateTime(date('m/d/Y h:i:s', time()));
    // si la date actuelle est inferieur a la date de la derniere information alors on affiche le formulaire sinon redirige le sur la liste des ruches
    if($current_date->diff($date_create)->i>30){
        $d=$current_date->diff($date_create)->i;


        echo "passe"+$info->getId();
    }else{

        $d=$current_date->diff($date_create)->i;
        $a['message']="passe";
        $a['time']=$d;
        $a[' $current_date']= $current_date;
        $a['$date_create']=$date_create;
        echo "encours_"+$d;

    }

}

function addInformation(){
    require('view/information/createInformation.php');
}



/**
 * function qui  permet d'enregistrer  une information
 * @param array $dataInformation
 * @throws Exception
 *
 */
function saveInformation(array $dataInformation){

    $information = new Information($dataInformation);

    $informationManager=new InformationManager();
    $affectedLinesInfo = $informationManager->add($information);

    if (!$affectedLinesInfo) {
        throw new Exception('Impossible d\'ajouter une information !');
    }
    else {
        header('Location: index.php?action=listeInformation');
    }
}
/**
 * function qui permet d'afficher la liste des informations
 *
 */
function listInformation(){

    $informationManager=new InformationManager();


    $listInformation = $informationManager->getListInfoAndRuche();

    require('view/information/listInformations.php');
}




/**
 * function qui permet de modifier   une information
 * @param array $dataInfo
 * @throws Exception
 */

function updateOneInfo(array $dataInfo){
    $ruche = new Information($dataInfo);
    $InformationManager=new InformationManager();


    $affectedLines = $InformationManager->update($ruche);
    if (!$affectedLines) {
        throw new Exception('Impossible de modifier cette ruche !');
    }
    else {
        header('Location: index.php?action=listeInformation');
    }
}


/**
 * function qui permet d'afficher le formulaire  pour modifier une information
 * @param int $id
 */

function updateFormInfo($id){
    $informationManager=new InformationManager();
    $OneInfos = $informationManager->get($id);
    require('view/information/updateInformation.php');
}

/**
 * function qui permet de supprimer une information
 * @param int $id
 * @throws Exception
 */
function deleteInformation(  $id){
    $informationManger=new InformationManager();
    $affectedLines = $informationManger->delete($id);
    if (!$affectedLines) {
        throw new Exception('Impossible d\'effectuer cette suppresion !');
    }
    else {
        header('Location: index.php?action=listeInformation');
    }
}

/**
 * @return bool
 */

function formInformation(){
    require('view/information/createInformation.php');
}
function isValid( $id){
    $informationManager=new InformationManager();
    $info=$informationManager->getLastItemInfosOfRuche($id);

   return $info;

}

