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
               // echo $requete ; 
               // var_dump($donnees);
                $insert = $this->pdo->prepare($requete);
                $insert->execute($donnees); 
            }
        }

        public function delete($where, $operateur){
            if ($this->pdo == null){
                return null;
            }else{
                $champ = array();
                $donnees = array();
                foreach($where as $cle => $valeur){
                    $champ[] = $cle. "= :".$cle;
                    $donnees[":".$cle] = $valeur;
                }$chainewhere = implode($operateur, $champ);

                $requete = "delete from ".$this->table." where ".$chainewhere.";";
                $delete = $this->pdo->prepare($requete);
                $delete->execute($donnees); 
            }
        }

        public function selectWhere($champ, $where, $operateur){
            if ($this->pdo == null){
                return null;
            }else{
                $donnees = array();
                $champwhere = array();
                foreach($where as $cle => $valeur){
                    $champwhere[] = $cle. "= :".$cle;
                    $donnees[":".$cle] = $valeur;
                }$chainewhere = implode($operateur, $champwhere);
                $chaineChamps = implode(",",$champ);

                $requete = "select ".$chaineChamps." from ".$this->table." where ".$chainewhere.";";
                //var_dump($requete);

                $select = $this->pdo->prepare($requete);
                $select->execute($donnees); 
                $resultats = $select -> fetchAll();
                //var_dump($resultats);

                return $resultats;
            }
        }

        public function update($tab, $where, $operateur){
            if ($this->pdo == null){
                return null;
            }else{
                $donnees = array();
                $champwhere = array();
                $champ = array();
                foreach($tab as $cle => $valeur){
                    $champ[] = $cle. "= :".$cle;
                    $donnees[":".$cle] = $valeur;
                }$chaineChamps = implode(",",$champ);

                foreach($where as $cle => $valeur){
                    $champwhere[] = $cle. "= :".$cle;
                    $donnees[":".$cle] = $valeur;//ne rentre pas les meme donnees dans $donnees car pas les mm cles
                }$chainewhere = implode($operateur, $champwhere);

                $requete = "update ".$this->table." set ".$chaineChamps." where ".$chainewhere.";";
                //var_dump($requete);

                $update = $this->pdo->prepare($requete);
                $update->execute($donnees); 
            }
        }
    }
?>