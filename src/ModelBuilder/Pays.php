<?php
namespace App\ModelBuilder;
class Pays extends Model
{
  private $pays;
  function __construct()
  {
    $pays = $this->getPays();
  }

  public function insertPays($tab)
  {
    $pays = $this->insert('pays',$tab);
    return $this->getPays();
  }

  public function getPays()
  {
    $pays = $this->all('pays');
    return $pays;
  }

  public function getOnePays($pnom)
  {
    $pays = $this->findOne('pays', array('nom' => $pnom));
    return $pays;
  }

}
 ?>
