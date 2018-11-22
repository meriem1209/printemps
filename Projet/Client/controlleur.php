<?php
    include("modele.php");
    class Controlleur{
        private $unModele;
        public function __construct($server, $bdd, $user, $mdp){
            $this->unModele = new Modele ($server, $bdd, $user, $mdp);
        }

        public function setTable ($uneTable){
            $this->unModele->setTable($uneTable);
        }

        public function select_all(){
            $resultats = $this->unModele->select_all(); //appel de la fct selection du modele
    
            //on realise ici des traitements si besoins

            //on retourne des resultats
            return $resultats;
        }

        public function insert($tab){
            $this->unModele->insert($tab);
        }

        

    }
?>