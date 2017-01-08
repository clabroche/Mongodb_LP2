<?php
namespace App\Controller;
use App\ModelBuilder\Model;
/**
 *
 */
class VilleController extends Controller
{
  public function getInterets()
  {
    $villeCollection = new Model('villes');
    $pointInteretCollection = new Model('pointInterets');
    $ville = $villeCollection->findOne(array('nom' => $_POST['name']));
    foreach ($ville->id_pointsInteret as $key => $id) {
      $ville->pointsInteret[] = $pointInteretCollection->findOne(array('_id'=>$id));
    }

    return json_encode($ville);
  }
}


 ?>
