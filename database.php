<?php
/* class database
* Se connecter à la base de données
 * Bien gérer les ressources (pattern Singleton)
 * simplifier l'utilisation de PDO
  */
class database
{


    //propriété privée - instance unique de la connexion
    private static $instance = null;


    // pour stocker l'objet $pdo
    private $pdo;

    // Constructeur privé (il ne peut etre appelé qu'une fois
    private function __construct(){
        //Config BDD
        $host = "localhost";
        $database = "star_wars";
        $user = "root";
        $password = "";

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
            $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die("Erreur de connexion : ".$e->getMessage());
        }
    }

    public static function getInstance(){
        if(self :: $instance == null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(){
        // retourne l'objet PDO. Why ? Pour voir faire des requetes
        return $this->pdo;
    }
}

// Exemple pour appeler cette classe

/*$db = Database::getInstance() -> getConnection();*/