<?php
namespace App\ModelBuilder;
class Evenement extends Model
{
  private $evenements;
  function __construct()
  {
    $evenements = $this->getEvenements();
  }

  public function insertEvenement($tab)
  {
    $evenement = $this->insert('evenements',$tab);
    return $this->getEvenements();
  }

  public function getEvenements()
  {
    $evenements = $this->all('evenements');
    return $evenements;
  }

  public function getEvenement($enom)
  {
    $evenement = $this->findOne('evenements', array('nom' => $enom));
    return $evenement;
  }

}
 ?>
