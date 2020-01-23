<?php

require '../DAO/Dao.php';
require '../DAO/MyPDOException.php';


class AcrDAO extends Dao {
    //put your code here
    public function delete($object) {
        
    }

    public function find($id) {
            
    }
    
     public function findID($nom) {
            $sql="SELECT idaliment from aliment where nomAliment = '".$nom."';";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
            return $tab;
    }

    public function findAll() {
        
    }

    public function insert($object) {
               if ($object ==null)
            throw new \MyPDOException("L'objet est nul");
      
        else{
            
            $sql="SELECT idaliment from aliment where nomAliment = '".$object->get_idAliment()."';";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup

            
           echo $tab[0]['idaliment'];
            $object->set_idaliment($tab[0]['idaliment']);
            
          $sql="SELECT idrecette from recette where nom = '".$object->get_idRecette()."';";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup

            echo $object->get_idRecette();
            
            var_dump($tab);
            
           echo $tab[0]['idrecette'];
            $object->set_idRecette($tab[0]['idrecette']);
            
            
            
            
            
            $sql="INSERT INTO comprend VALUES(:idAliment,:idRecette,:quantite);";
            $this->pdo->exec("set names 'utf8'");
            $pst=null;
            $pst=$this->pdo->prepare($sql);
            $pst->bindValue('idAliment', $object->get_idAliment(), \PDO::PARAM_INT);
            $pst->bindValue('idRecette', $object->get_idRecette(), \PDO::PARAM_INT);
            $pst->bindValue('quantite', $object->get_quantité(), \PDO::PARAM_STR);
            
         
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
    
    public function getToutAliments($recette){
        $sql= "SELECT idRecette from recette where nom = '".$recette."';";
          $result = $this->pdo->query($sql);
        $tab3 = $result->fetchAll(PDO::FETCH_ASSOC); //tab asso
        
        $sql ="SELECT * from comprend where idRecette=".$tab3[0]['idRecette'].";";
         $result = $this->pdo->query($sql);
        $tab3 = $result->fetchAll(PDO::FETCH_ASSOC); //tab asso
        
        return $tab3;
    }
    
    public function deletealiment($id,$idr){
        echo $id ;

            var_dump($this);  
               $sql="DELETE from comprend WHERE idaliment = ".$id." AND idRecette = " .$idr.";";
               echo $sql;
            $sql = $this ->pdo->exec($sql);
           
    }

    public function obtenirRecords($id){
           $sql="SELECT idrecette from comprend where idaliment = '".$id."';";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
            return $tab;
    }
}
