<?php

require '../DAO/Dao.php';
require '../DAO/MyPDOException.php';

class RecetteDAO extends Dao {
    //put your code here
    public function delete($object) {
        
    }

    public function find($id) {
            $sql="SELECT nom from recette where idRecette = ".$id.";";
            echo $sql;
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
            var_dump($tab);
            return $tab;
    }

    public function findAll() {
        
    }

    public function insert($object) {
           if ($object ==null)
            throw new \MyPDOException("L'objet est nul");
        else if ($object->getId() !=0)
            throw new \MyPDOException("L'objet utilisateur déjà encodé");
        else{
            
            $sql="SELECT idUtilisateur from Utilisateur where Login = '".$object->getCreateur()."';";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup

            
            echo $tab[0]['idUtilisateur'];
            $object->setCreateur($tab[0]['idUtilisateur']);
            
          
            
            
            
            
            $sql="INSERT INTO recette VALUES(null,:nom,:description,:visibilite,:idUtilisateur);";
            $this->pdo->exec("set names 'utf8'");
            $pst=null;
            $pst=$this->pdo->prepare($sql);
            $pst->bindValue('nom', $object->getNom(), \PDO::PARAM_STR);
            $pst->bindValue('description', $object->getDescription(), \PDO::PARAM_STR);
            $pst->bindValue('visibilite', $object->getVisibilité(), \PDO::PARAM_BOOL);
            $pst->bindValue('idUtilisateur',$object->getCreateur(), \PDO::PARAM_INT);
            
         
                $pst->execute();
                $taber= $pst->errorInfo();
              
                return $taber[1];
            
            $key = $this->pdo->lastInsertId();
            $object->setId((int) $key);
            
            return $key;
        }
    
    }

    public function nbRecords() {
            $SqlCount = "SELECT COUNT(*) AS nb FROM Recette;";
        $result = $this->pdo->query($SqlCount); //query pour recuperer qq chose(select)  //execute pour insert,update,delete
        $tab = $result->fetch(PDO::FETCH_ASSOC); //recuprer PDOstatement
        
        return $tab;
    }

    public function update($object) {
        
    }
    
    public function recordsLimit($page,$group){
         $sqlLimit = "SELECT * FROM recette LIMIT " . ($page * $group) . "," . $group . ";";
        $result = $this->pdo->query($sqlLimit);
        $tab3 = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
        return $tab3;
    }

}
