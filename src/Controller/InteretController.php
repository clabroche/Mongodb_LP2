<?php
namespace App\Controller;
use App\ModelBuilder\PointInteret;
/**
 *
 */
class InteretController extends Controller
{
  public function index()
  {

  }

    public function addInteret() {
      $interetCollection = new PointInteret();
      $interet[] = array('x' => $_POST["lat"],'y' => $_POST["lng"]);
      $insertPays = $interetCollection->insertPointInteret($interet);
      unset($_POST["country_name"]);
    }


      public function getInteret() {
        $interetCollection = new PointInteret();
        $points = $interetCollection->getPointInterets();
        echo json_encode($points);
      }

}


 ?>
