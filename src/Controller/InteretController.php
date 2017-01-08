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
    $interet[] = array('x' => $_POST["lat"],'y' => $_POST["lng"], 'nom' => $_POST["point_name"], 'description'=> $_POST["point_description"]);

    $ville = $villeCollection->findOne(array('nom' => $_POST["city_name"]));
    if(!($interetCollection->findOne(array('nom' => $_POST["point_name"])))) {
      $insertInteret = $interetCollection->insertOne($interet);
    }

    $pointInteret = $interetCollection->findOne(array('nom' => $_POST["point_name"] ));

    //on regarde si la ville éxiste, si ce n'est pas le cas, on l'ajoute
    if($ville) {
      $verified=$villeCollection->updateArrayId($ville->id_pointsInteret,$pointInteret->_id);
      if($verified == false) {
        $villeCollection->update(['nom' => $_POST["city_name"]],['id_pointsInteret'=>$pointInteret->_id]);
      }
      //echo json_encode($villeCollection->findOne(array('nom' => $_POST["city_name"])));
      echo json_encode($villeCollection->findOne(array('nom' => $_POST["city_name"])));
    }
    else {
      $ville[] = array('nom' => $_POST["city_name"],"id_pointsInteret"=> array($pointInteret->_id));
      $ville_ajoutee = $villeCollection->insertOne($ville);

      echo json_encode($villeCollection->findOne(array('nom' => $_POST["city_name"])));
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
