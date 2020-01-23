<?php



class MyPdo
{
    // classe singleton
    //les attributs
    private $pdo = null;
    private static $myPdo = null;
    private static $dsn = null;
    private static $user = null;
    private static $password = null;



    //constructeur , singleton donc le constructeur est en privé
    private function __construct()
    {
        try{
            $this->pdo=new \PDO(self::$dsn,self::$user,self::$password); //recup du require once < parametre.php
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_WARNING); //plus complet que exception
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES,true);
            $this->pdo->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES utf8");
        }
        catch(\PDOException $e){
            throw new \Exception ($e->getMessage());
        }
    }
    /*
     * A revérifier ...
     * pour utiliser utf8 avec PDO
     * a) rajouter charset=utf-8 au niveau du constructeur depuis version
     * b) modifier l'attribut avec MYSQL_ATTR_INIT_COMMAND
     * c) avec $this->pdo->exec("SET CHARACTER SET utf8");
     */

    function __destruct()
    {
            $this->pdo = null;
            self::$myPdo = null;
    }

    public static function getInstancePdo()
    {
        if (!isset($myPdo))    {
            self::$myPdo= new MyPdo();
        }
        return self::$myPdo->pdo;

    }
    //retourne un objet Pdo

    public static function getInstanceSingleton()
    {
        if (!isset($myPdo))
        {
            self::$myPdo= new MyPdo();
        }
        return self::$myPdo;
    }
    //retourne une instance de la classe myPdo

    public static function setParameters ($dsn , $user ,$password)
    {
        self::$dsn=$dsn;
        self::$user=$user;
        self::$password=$password;
    }


    public function getPdo()
    {
        return $this->pdo;
    }

}
