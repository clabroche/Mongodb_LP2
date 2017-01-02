<?php
namespace App\ModelBuilder;
class Departement extends Model
{
  private $departements;
  function __construct()
  {
    $departements = $this->getDepartements();
  }

  public function insertDepartements($tab)
  {
    $departements = $this->insert('departements',$tab);
    return $this->getDepartements();
  }

  public function getDepartements()
  {
    $departements = $this->all('departements');
    return $departements;
  }

  public function getDepartement($departement)
  {
    $departement = $this->findOne('departements', array('nom' => $departement));
    return $departement;
  }

}
 ?>
