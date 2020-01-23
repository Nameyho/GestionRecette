<?php

require '../DAO/Dao.php';
require '../DAO/MyPDOException.php';

class UtilisateurDAO extends DAO {
    //put your code here
    public function delete($object) {
        if ($object ==null)
            throw new \MyPDOException("L'objet est nul");
        else {
            $login = $object->getLogin();
            
           $sql="SELECT idUtilisateur FROM UTILISATEUR WHERE Login = "."\"".$login."\"".";";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
            
            
            $id = $tab[0]['idUtilisateur'];
            echo $id;     
             $sql="DELETE from recette WHERE idUtilisateur = ".$id." ;";
            $sql = $this ->pdo->exec($sql);
            
                 $sql="DELETE from aliment WHERE idUtilisateur = ".$id." ;";
            $sql = $this ->pdo->exec($sql);
         
            $sql="DELETE from utilisateur WHERE Login = '".$login."' ;";
            $sql = $this ->pdo->exec($sql);
        
        }
    }

  
    public function find($id) {
         if($id==null){
           throw new \MyPDOException("L'objet est nul");
    }else{
        $sql="SELECT * FROM UTILISATEUR WHERE idUtilisateur = "."\"".$id."\"".";";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup

            return $tab;
    }
    }

    public function insert($object) {
           if ($object ==null)
            throw new \MyPDOException("L'objet est nul");
        else if ($object->getId() !=0)
            throw new \MyPDOException("L'objet utilisateur déjà encodé");
        else{
            $sql="INSERT INTO utilisateur VALUES(null,:login,:nom,:prenom,:mdp,:email,:activation,:code);";
            $this->pdo->exec("set names 'utf8'");
            $object->set_activation(false);
            $pst=null;
            $pst=$this->pdo->prepare($sql);
            $pst->bindValue('login', $object->getLogin(), \PDO::PARAM_STR);
            $pst->bindValue('nom', $object->getNom(), \PDO::PARAM_STR);
            $pst->bindValue('prenom', $object->getPrenom(), \PDO::PARAM_STR);
            $pst->bindValue('mdp', $object->getMdp(), \PDO::PARAM_STR);
            $pst->bindValue('email', $object->getEmail(), \PDO::PARAM_STR);
            $pst->bindValue('activation',$object->get_activation(), \PDO::PARAM_BOOL);
            $pst->bindValue('code',$object->get_code(),\pdo::PARAM_STR);
            try {
                $pst->execute();
                $taber= $pst->errorInfo();
              
                return $taber[1];
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            $key = $this->pdo->lastInsertId();
            $object->setId((int) $key);
        }
    }

    public function nbRecords() {
        
    }

    public function update($object) {
        
    }

    public function findAll() {
        
    }
    
    public function recupHash($joueur){
             if ($joueur ==null)
            throw new \MyPDOException("L'objet est nul");
      
        else{
            $sql="SELECT mdp FROM UTILISATEUR WHERE Login = "."\"".$joueur->getLogin()."\"".";";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
       
        
        return $tab;
        }
    }
    
public function recupid($login){
    if($login==null){
           throw new \MyPDOException("L'objet est nul");
    }else{
        $sql="SELECT idUtilisateur FROM UTILISATEUR WHERE Login = "."\"".$login."\"".";";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
            
            
            $id = $tab[0]['idUtilisateur'];
            return $id;
    }
}
    public function desactiver($joueur){

       $sql= "UPDATE utilisateur SEt activation = '0' where Login = '".$joueur->getLogin()."';";
       
      
       $this->pdo->exec($sql);
    }
    
    public function statutActivation($login){
          $sql="SELECT activation FROM UTILISATEUR WHERE Login = "."\"".$login."\"".";";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
            return $tab;
    }
    
    public function deleteincomplet($id){
          $sql= "UPDATE recette Set idUtilisateur = '0' where idUtilisateur = '".$id."';";
       

       $this->pdo->exec($sql);
       
             $sql="DELETE from utilisateur where idUtilisateur = '".$id."';";
            $sql = $this ->pdo->exec($sql);
            
       
    }
    
    public function activercompte($util){
        
             $sql="SELECT code FROM UTILISATEUR WHERE Login = "."\"".$util->getLogin()."\"".";";
            $result = $this-> pdo->query($sql);
            $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
        
            var_dump($tab);
            if($tab[0]['code']==$util->get_code()){
                    $sql= "UPDATE utilisateur SEt activation = '1' where Login = '".$util->getLogin()."';";
            }
        
      
       
      
       $this->pdo->exec($sql);
    }

}
