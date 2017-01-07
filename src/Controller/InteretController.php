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
      $interet[] = array('x' => $_POST["lat"],'y' => $_POST["lng"]);
      //on regarde si la ville éxiste, si ce n'est pas le cas, on l'ajoute
      $ville = $villeCollection->getVille($_POST["city_name"]);

      $insertInteret = $interetCollection->insertPointInteret($interet);
      echo json_encode(array($ville,$insertInteret));
      /*if($ville) {
        $ville->addPointInteret($ville->_id,$insertPays->_id);
      }
      else {
        $ville_ajoutee = $villeCollection->insertVille($array('nom' => $_POST["city_name"],'points_interets' => array($insertPays->_id)));
      }*/
      //
    }


      public function getInteret() {
        $interetCollection = new PointInteret();
        $points = $interetCollection->getPointInterets();
        echo json_encode($points);
      }

}


 ?>
