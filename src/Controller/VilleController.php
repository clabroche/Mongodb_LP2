<?php
namespace App\Controller;
use App\ModelBuilder\Ville;
/**
 *
 */
class VilleController extends Controller
{
  public function index()
  {
    $page = "
      <form action='index.php' method='POST'>
        <input type='submit' value=\"Retour à l'acceuil\">
      </form>
      <form action='../../' method='POST'>
        <input type='submit' value=\"Retour au département\">
      </form>
    ";

    //on ajoute le pays puis on les affiche tous
    $villeCollection = new Ville();
    $page = $page."<h3>Liste des villes du département</h3>";
    if(isset($_POST["city_name"])) {
      $ville[] = array('nom' => $_POST["city_name"]);
      $insertVille = $villeCollection->insertVille($ville);
      unset($_POST["city_name"]);
    }

    //j'attend d'avoir l'ajout et affichage de département fonctionnel pour afficher uniquement les ville du département choisi

    /*$page = $page."<ul>";

    $countries = $paysCollection->getPays();
    if(sizeof($countries) > 0) {
      foreach ($countries as $value) {
        $page = $page."<li><a href=country_list/".$value->_id.">".$value->nom."</a></li>";

      }
    }
    $page = $page."</ul>";*/
    echo $page;
  }

  public function addCity() {
    echo "
      <form action='cities' method='POST'>
        <input type='text' value='Nom de la ville' Name='city_name'>
        <input type='submit' value='Ajouter'>
      </form>
    ";
  }

}


 ?>
