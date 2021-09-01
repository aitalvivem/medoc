<?php
class UnePhoto{
	private $id;
	private $nom;
	private $photo;
	private $alt;
	
	public function __construct(array $donnees){
		foreach($donnees as $key => $value){
			$method = 'set'.ucfirst($key);
			
			if(method_exists($this, $method))
				$this->$method($value);
		}
	}
	
	public function miniature(){
		$miniature = '<div class="miniature">
						<a href="images/galerie/'.$this->photo().'" target="_blank">
						<img src="images/galerie/'.$this->photo().'" title="'.$this->nom().'" alt="'.$this->alt().'" />
						</a>
						<p>'.$this->nom().'</p>
					</div>';
		echo $miniature;
	}
	
	// mutateurs
	public function setId($id){
		$id = (int) $id;
		$this->id = $id;
	}
	public function setNom(String $nom){
		$this->nom = $nom;
	}
	public function setPhoto(string $fichier){
		$this->photo = $fichier;
	}
	public function setAlt(string $alt){
		$this->alt = $alt;
	}
	
	// accesseurs
	public function id(){
		return $this->id;
	}
	public function nom(){
		return $this->nom;
	}
	public function photo(){
		return $this->photo;
	}
	public function alt(){
		return $this->alt;
	}
}
?>