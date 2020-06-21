<?php
require_once("model/Manager.php");
require_once("class/Ruche.php");
class RucheManager extends Manager{

    /**
     * ajouter une ruche
     * @param Ruche $ruche
     * @return bool
     */
	public function add(Ruche $ruche)
	{
	  $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO ruches (name, latitude, longitude, create_at) VALUES(?, ?, ?, NOW())');
        $affectedLines = $q->execute(array($ruche->getName(), $ruche->getLatitude(),  $ruche->getLongitude()));
        return $affectedLines;
	}

    /**
     *  recupérer une ruche
     * @param $id
     * @return Ruche
     */
	public  function  get($id)
	{
	  $id = (int) $id;
        $db = $this->dbConnect();
	  $q =$db->query('SELECT id, name, latitude, longitude, create_at FROM ruches WHERE id = '.$id);
	  $donnees = $q->fetch(PDO::FETCH_ASSOC);
  
	  return new Ruche($donnees);
	}

    /**
     * recupérer la liste des ruches
     * @return array
     */
	public function getList()
	{
	  $ruches = [];
	  $db = $this->dbConnect();
	  $q = $db->query('SELECT id, name, latitude, longitude, create_at FROM ruches ORDER BY id');
		
	  while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
	  {
		 
		 $ruches[] = new Ruche($donnees);
	  }
  
	  return $ruches;
	}

    /**
     * @return array
     */
	public function getListInfoAndRuche()
	{
		$infos = [];
		$q = $this->_db->query('SELECT r.id, r.name, r.latitude, r.longitude, r.create_at   i.id, i.weight, i.humidity, i.ruche_id, i.create_at FROM informations i,ruches r WHERE i.id=r.id ORDER BY id');
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
		  $infos[] = new Ruche($donnees);
		}
	
		return $infos;
	}

    /**
     * modifier une ruche
     * @param Ruche $ruche
     * @return bool
     */
	public function update(Ruche $ruche)
	{

		 $db = $this->dbConnect();
		$q = $db->prepare('UPDATE  ruches SET name=:name,latitude=:latitude,longitude=:longitude,update_at=NOW() WHERE id=:id ');
		$data=array('id'=>$ruche->getId(),
					'latitude'=> $ruche->getLatitude(),
					'longitude'=>$ruche->getLongitude(),
					'name'=>$ruche->getName()
					);
        $affectedLines = $q->execute($data);
	  return $affectedLines;
	}

    /**
     * supprimer une ruche
     * @param $id
     * @return bool
     */
	public function delete($id){
		$db = $this->dbConnect();
		$q =$db->query('DELETE FROM ruches WHERE id='.$id);
        $affectedLines = $q->execute();
        return $affectedLines;
	}
  
}