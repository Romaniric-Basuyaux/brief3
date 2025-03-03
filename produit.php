<?php
require 'Database.php';
class produit {
    // Propriete prive
    private $pdo;


    // Constructeur
    public function __construct() {
        // Retourne une instance de Database
        $this->pdo = Database::getInstance()->getConnection();
    }

    /**Ajout d'un nouveau produit
     * @param string $nom Nom produit
     * @param float $prix Prix Produit
     * @param int $stock Quantité Produit
     * @return boolean True si ajout OK sinon false
     */


    public function ajouter( string $nom, float $prix, int $stock){
        // Requete prepare
        $stmt = $this->pdo->prepare("INSERT INTO film (nom, prix, stock) VALUES(?, ?, ?)");

        return $stmt->execute(array($nom, $prix, $stock));
    }
    /**Liste des produits de la BDD
     * @return array TABLEAU Associatif contenant des produits
     */

public function lister(){
    $stmt = $this->pdo->query("SELECT * FROM film");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function modifier( string $nom, float $prix, int $stock){
    $stmt = $this->pdo->prepare("UPDATE film SET nom = ?, prix = ?, stock = ?");
   return $stmt->execute([$nom, $prix, $stock]);

}
public function supprimer(int $id){
    $stmt = $this->pdo -> prepare("DELETE FROM film");
    return $stmt->execute(array($id));
}


}
