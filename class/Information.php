<?php
class Information{
    private $_id;
    private $_weight;
    private $_humidity;
    private $_temperature;
    private $_create_at;
    private $_update_at;
    private $_ruche_id;


      public function __construct(array $data)
      {
      $this->hydrate($data);
      }



      public function getTemperature(){
        return $this->_temperature;
       }
      
       public function setTemperature($_temperature){
        $this->_temperature =  $_temperature;
       }

      public function getId(){
        return $this->_id;
       }
      
       public function setId($_id){
        $this->_id = (int) $_id;
       }
      
       public function getWeight(){
        return $this->_weight;
       }
      
       public function setWeight($_weight){
        $this->_weight =$_weight;
       }
      
       public function getHumidity(){
        return $this->_humidity;
       }

       public function setHumidity($_humidity){
        $this->_humidity = $_humidity;
       }
      
       public function getCreate_at(){
        return $this->_create_at;
       }
      
       public function setCreate_at($_create_at){
        $this->_create_at = $_create_at;
       }
      
       public function getUpdate_at(){
        return $this->_update_at;
       }
      
       public function setUpdate_at($_update_at){
        $this->_update_at = new DateTime();
       }

       public function getRuche_id(){
        return $this->_ruche_id;
       }
      
       public function setRuche_id($_ruche_id){
        $this->_ruche_id = (int) $_ruche_id;
       }


      protected function hydrate(array $donnees)
      {
          foreach ($donnees as $key => $value)
          {
            $method = 'set'.ucfirst($key);
              
            if (method_exists($this, $method))
            {
              $this->$method($value);
            }
          }
      }
}