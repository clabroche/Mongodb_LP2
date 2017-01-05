<?php
namespace App\ModelBuilder;
class Ville extends Model
{
  private $villes;
  function __construct()
  {
    $villes = $this->getVilles();
  }

  public function insertVille($tab)
  {
    $ville = $this->insert('villes',$tab);
    return $this->getVilles();
  }

  public function getVilles()
  {
    $villes = $this->all('villes');
    return $villes;
  }

  public function getVille($vnom)
  {
    $ville = $this->findOne('villes', array('nom' => $vnom));
    return $ville;
  }

}
 ?>
