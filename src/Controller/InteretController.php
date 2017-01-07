<?php
namespace App\Controller;
use App\ModelBuilder\Model;
/*
*
*/
class InteretController extends Controller
{
  public function index()
  {

  }

  public function addInteret() {
    $interetCollection = new Model('pointInterets');
    $villeCollection = new Model('villes');
    $interet[] = array('x' => $_POST["lat"],'y' => $_POST["lng"], 'nom' => $_POST["point_name"]);
    //on regarde si la ville éxiste, si ce n'est pas le cas, on l'ajoute
    $ville = $villeCollection->findOne(array('nom' => $_POST["city_name"]));

    $insertInteret = $interetCollection->insertOne($interet);
    $pointInteret = $interetCollection->findOne(array('nom' => $_POST["point_name"] ));

    if($ville) {
      $found = false;
      foreach ($ville->id_pointsInteret as $key => $id) {
        if ($id == $pointInteret->_id) {
            $found = true;
            break;
        }
      }
      if (!$found) {
       $ville->id_pointsInteret[]=$pointInteret->_id;
      }

      $villeCollection->update(['nom' => $_POST["city_name"]],['id_pointsInteret'=>$ville->id_pointsInteret]);
      //echo json_encode($villeCollection->findOne(array('nom' => $_POST["city_name"])));
      echo json_encode($ville);
    }
    else {
      $ville[] = array('nom' => $_POST["city_name"],"id_pointsInteret"=> $pointInteret->_id );
      $ville_ajoutee = $villeCollection->insertOne($ville);

      echo json_encode($ville);
    }
  }


  public function getInterets() {
    $interetCollection = new Model('pointInterets');
    foreach ($interetCollection->all() as $key => $value) {
      $array[$key]=$value;
    }
    echo json_encode($array);
  }

}


?>
