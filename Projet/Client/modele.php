<?php
    class Modele{
        private $pdo, $table;

        public function __construct ($server, $bdd, $user, $mdp){
            $this->pdo = null;
            try{
                $this->pdo = new PDO("mysql:host=".$server.";dbname=".$bdd, $user, $mdp);
            }
            catch(PDOExeption $exp){
                echo "erreur de connexion";
            }
        }

        public function select_all(){
            if($this->pdo == null){
                return null;
            }else{
                $requete = "select * from ".$this->table.";";
                $select = $this->pdo->prepare($requete);
                $select->execute();
                $resultats = $select->fetchALL();
                return $resultats;
            }
        }

        public function setTable($uneTable){
            $this->table = $uneTable;
        }

        public function insert($tab){
            if($this->pdo == null){
                return null;
            }else{
                $champ = array();
                $donnees = array();
                foreach($tab as $cle => $valeur){
                    $champ[] = ":".$cle;
                    $donnees[":".$cle] = $valeur;
                }$chaineChamps = implode(",",$champ);

                $requete = "insert into ".$this->table." values (null, ".$chaineChamps.");";
                $insert = $this->pdo->prepare($requete);
                $insert->execute($donnees); 
            }
        }

    }
?>