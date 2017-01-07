<?php
namespace App\Controller;
use App\ModelBuilder\PointInteret;
use App\ModelBuilder\Ville;
/*
*
*/
class InteretController extends Controller
{
  public function index()
  {

  }

  public function addInteret() {
    $interetCollection = new PointInteret();
    $villeCollection = new Ville();
    $interet[] = array('x' => $_POST["lat"],'y' => $_POST["lng"], 'nom' => $_POST["point_name"]);
    //on regarde si la ville éxiste, si ce n'est pas le cas, on l'ajoute
    $ville = $villeCollection->getVille($_POST["city_name"]);

    $insertInteret = $interetCollection->insertPointInteret($interet);
    $pointInteret = $interetCollection->getPointInteret($_POST["point_name"]);

    if($ville) {
      echo json_encode($ville);
    }
    else {
      $ville[] = array('nom' => $_POST["city_name"] );
      $ville_ajoutee = $villeCollection->insertVille($ville);

      echo json_encode($ville);
    }
  }


  public function getInteret() {
    $interetCollection = new PointInteret();
    $points = $interetCollection->getPointInterets();
    echo json_encode($points);
  }

}


?>
