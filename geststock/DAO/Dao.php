<?php

abstract class Dao
{

    protected $pdo=null;

    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    
    }

    public abstract function insert($object);
    public abstract function delete($object);
    public abstract function update($object);
    public abstract function find($id);
    public abstract function findAll();
    //public abstract function findAllQuick();
    public abstract function nbRecords();
    //public abstract function findWithLimit(int $position, int $group);

}