<?php
	class Ruche{
		private $_id;
		private $_name;
		private $_latitude;
		private $_longitude;
		private $_create_at;
		private $_update_at;

		public function __construct(array $data)
			{
			$this->hydrate($data);
			}

		public function getId(){
			return $this->_id;
		}

		public function setId($_id){
			$this->_id =(int) $_id;
		}

		public function getName(){
			return $this->_name;
		}

		public function setName($_name){
			$this->_name =  $_name;
		}

		public function getLatitude(){
			return $this->_latitude;
		}

		public function setLatitude($_latitude){
			$this->_latitude = $_latitude ;
		}

		public function getLongitude(){
			return $this->_longitude;
		}

		public function setLongitude($_longitude){
			$this->_longitude =$_longitude ;
		}

		public function getCreateAt(){
			return $this->_create_at;
		}

		public function setCreateAt(){
			$this->_create_at = new \DateTime();
		}

		public function getUpdateAt(){
			return $this->_update_at;
		}

		public function setUpdateAt(){
			$this->_update_at = new \DateTime();
		}

		public function hydrate(array $donnees)
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


