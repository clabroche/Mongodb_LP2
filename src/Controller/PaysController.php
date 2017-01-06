<?php
namespace App\Controller;
use App\ModelBuilder\Pays;
/**
 *
 */
class PaysController extends Controller
{
  public function index()
  {
    $page = "
      <form action='index.php' method='POST'>
        <input type='submit' value=\"Retour à l'acceuil\">
      </form>
    ";

    //on ajoute le pays puis on les affiche tous
    $paysCollection = new Pays();
    $page = $page."<h3>Liste des pays</h3>";
    if(isset($_POST["country_name"])) {
      $pays[] = array('nom' => $_POST["country_name"]);
      $insertPays = $paysCollection->insertPays($pays);
      unset($_POST["country_name"]);
    }

    $page = $page."<ul>";

    $countries = $paysCollection->getPays();
    if(sizeof($countries) > 0) {
      foreach ($countries as $value) {
        $page = $page."<li>".$value->nom."</li>";
      }
    }
    $page = $page."</ul>";
    echo $page;
  }

}


 ?>
