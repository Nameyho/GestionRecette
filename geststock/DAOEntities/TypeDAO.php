<?php

require '../DAO/Dao.php';
require '../DAO/MyPDOException.php';


class TypeDAO  extends Dao{
    //put your code here
    public function delete($object) {
        
    }

    public function find($id) {
        
    }

    public function findAll() {
      

        $sql = "SELECT nom FROM type ORDER by nom ASC";
        $result = $this-> pdo->query($sql);
        $tab = $result->fetchAll(PDO::FETCH_ASSOC); //tab associatif a la recup
       
           return $tab;
    
    }    
    

    public function insert($object) {
        
    }

    public function nbRecords() {
        
    }

    public function update($object) {
        
    }

}
