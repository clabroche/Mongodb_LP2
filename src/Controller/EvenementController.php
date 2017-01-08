<?php
namespace App\Controller;
use App\ModelBuilder\Model;
/*
*
*/
class EvenementController extends Controller
{
  public function index()
  {

  }

  public function addEvenement() {
    $interetCollection = new Model('pointInterets');
    $evenementCollection = new Model('evenements');
    $event_name = "";
    if($_POST["event_name"] == "") {
      $event_name = "Unamed Evenement";
    }
    else {
      $event_name = $_POST["event_name"];
    }
    $pointInteret = $interetCollection->findOne(array('nom' => $_POST["point_name"]));

      $attributs[] = array('nom' => $event_name, 'description' => $_POST["event_desc"], 'date' => $_POST["event_date"]);
      //on insére un evenement
      $insertEvenement = $evenementCollection->insertOne($attributs);
      $evenement = $evenementCollection->findOne(array('nom' => $event_name, 'date' => $_POST['event_date']));
      $interetCollection->update(['_id' => $pointInteret->_id],['evenements'=>$evenement->_id]);


  }

  public function getEvenements()
  {
    $event_tab;
    $evenementCollection = new Model('evenements');
    $ids = $_POST['point'];
    foreach ($ids as $value) {
    //  echo json_encode($value['$oid']);
    $pd = $value;
      $event = $evenementCollection->findbyId($value['$oid']);
      $event_tab[] = array('nom' => $event->nom, 'id' => $event->_id);
    }

    echo json_encode($event_tab);
  }

  public function getEvenement()
  {
    $evenementCollection = new Model('evenements');
    $id_event = $_POST['event_id'];
    $event = $evenementCollection->findbyId($id_event);
    echo json_encode($event);
  }


}


?>
