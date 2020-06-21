<?php
require_once("model/Manager.php");
require_once("class/Information.php");
class InformationManager extends Manager{

    /**
     * ajouter une information
     * @param Information $information
     * @return bool
     *
     */
    public function add(Information $information)
    {

        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO informations (weight, humidity,temperature, ruche_id, create_at) VALUES(?, ?, ?,?, NOW())');
        $affectedLines = $q->execute(array($information->getWeight(),$information->getHumidity(),$information->getTemperature(),  $information->getRuche_id()));
        return $affectedLines;
    }

    /**
     * recupérer une information
     * @param $id
     * @return mixed
     */

    public function get($id)
    {
        $id = (int) $id;
        $db = $this->dbConnect();
        $q =$db->query('SELECT informations.id as info_id ,ruches.id,informations.temperature,informations.humidity,informations.create_at AS comment_date_fr ,informations.weight,ruches.latitude,ruches.longitude,ruches.create_at,ruches.name FROM informations JOIN ruches ON informations.ruche_id=ruches.id   WHERE informations.id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return $donnees;
    }

    /**
     * recupérer la date de la derniere information
     * @param $id
     * @return Information
     */
    public  function  getLastItemInfosOfRuche($id)
    {
        $id = (int) $id;
        $db = $this->dbConnect();
        $q =$db->query('SELECT * FROM informations WHERE ruche_id = '.$id);

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Information($donnees);
        }
        $length=count($infos);
        return  $infos[$length-1]  ;
    }

    /**
     * recupérer tous les informations de la bd
     * @return array
     */
    public function getList()
    {
        $infos = [];
        $db = $this->dbConnect();

        $q = $db->query('SELECT  * FROM informations ORDER BY id');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Information($donnees);
        }

        return $infos;
    }

    /**
     * @return bool|PDOStatement
     */
    public function getListInfoAndRuche()
    {
        $db = $this->dbConnect();
        $q = $db->query(' SELECT informations.id as info_id ,ruches.id,informations.temperature,informations.humidity,DATE_FORMAT(informations.create_at, "%d %M %Y à %Hh%i" ) AS comment_date_fr ,informations.weight,ruches.latitude,ruches.longitude,ruches.create_at,ruches.name FROM informations JOIN ruches ON informations.ruche_id=ruches.id ORDER BY informations.create_at' );
        return $q;
    }

    /**
     * @param Information $information
     * @return bool
     */
    public function update(Information $information)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('UPDATE informations SET temperature = :temperature, weight = :weight, humidity = :humidity, update_at =NOW() WHERE id = :id');

        $data=array('id'=>$information->getId(),
            'weight'=> $information->getWeight(),
            'humidity'=>$information->getHumidity(),
            'temperature'=>$information->getTemperature(),

        );
        $affectedLines = $q->execute($data);
        return $affectedLines;
    }

    /**
     * supprimer une information
     * @param $id
     * @return bool
     */
    public function delete($id){
        $db = $this->dbConnect();
        var_dump($id);
        $q =$db->query('DELETE FROM informations WHERE id='.$id);
        $affectedLines = $q->execute();
        return $affectedLines;
    }

    /**
     * @return Information|null
     */


}