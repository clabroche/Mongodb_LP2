<?php
namespace App\ModelBuilder;
class PointInteret extends Model
{
  private $pointInterets;
  function __construct()
  {
    $pointInterets = $this->getPointInterets();
  }

  public function insertPointInteret($tab)
  {
    $pointInterets = $this->insert('pointInterets',$tab);
    return $this->getPointInterets();
  }

  public function getPostInterets()
  {
    $pointInterets = $this->all('pointInterets');
    return $pointInterets;
  }

  public function getPointInteret($pnom)
  {
    $pointInteret = $this->findOne('pointInterets', array('nom' => $pnom));
    return $pointInteret;
  }

}
 ?>
