<?php
class Galerie{
	private $listPhoto;
	private $nbPhoto;
	
	public function __construct(array $donnees){
		require('UnePhoto.php');
		$i = 0;
		
		foreach($donnees as $key => $value){
			$liste[] = new UnePhoto($value);
			$i++;
		}
		
		$this->setNbPhoto($i);	
		$this->setListPhoto($liste);
	}
	
	public function afficher(){
		echo '<div class="gallerie">';
		foreach($this->listPhoto() as $key => $value)
			$value->miniature();
		echo '<div class="gallerie">';
	}
	
	public function setListPhoto($listPhoto){
		$this->listPhoto = $listPhoto;
	}
	public function setNbPhoto($nb){
		$this->nbPhoto = $nb;
	}
	
	public function nbPhoto(){
		return $this->nbPhoto;
	}
	public function listPhoto(){
		return $this->listPhoto;
	}
	
}
?>