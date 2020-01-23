<?php

require '../DAO/Dao.php';
require '../DAO/MyPDOException.php';


class AlimentDAO extends Dao {
    //put your code here
    public function delete($object) {
        
    }

    public function find($id) {
                  $sql = "SELECT nomAliment FROM aliment where idaliment = ".$id.";";
        $result = $this-> pdo->query($sql);
        $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
       
           return $tab;
    }

    public function findAll() {
            $sql = "SELECT nomAliment FROM aliment ORDER by nomAliment ASC";
        $result = $this-> pdo->query($sql);
        $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
       
           return $tab;
    
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
            
            $sql="SELECT idType from type where nom = '".$object->getType()."';";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup

            
            echo $tab[0]['idType'];
            $object->setType($tab[0]['idType']);
            
            
            
            
            $sql="INSERT INTO aliment VALUES(null,:nomAliment,:idtype,:idUtilisateur);";
            $this->pdo->exec("set names 'utf8'");
            $pst=null;
            $pst=$this->pdo->prepare($sql);
            $pst->bindValue('nomAliment', $object->getNom(), \PDO::PARAM_STR);
            $pst->bindValue('idtype', $object->getType(), \PDO::PARAM_INT);
            $pst->bindValue('idUtilisateur', $object->getCreateur(), \PDO::PARAM_INT);
           
         
                $pst->execute();
                $taber= $pst->errorInfo();
              
                return $taber[1];
            
            $key = $this->pdo->lastInsertId();
            $object->setId((int) $key);
        }
    
    }

    public function nbRecords() {
        
    }

    public function update($object) {
        
    }

}
