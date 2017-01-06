<?php
namespace App\ModelBuilder;
class GroupeInteret extends Model
{
  private $groupeInterets;
  function __construct()
  {
    $groupeInterets = $this->getGroupeInterets();
  }

  public function insertGroupeInteret($tab)
  {
    $groupeInteret = $this->insert('groupeInterets',$tab);
    return $this->getGroupeInterets();
  }

  public function getGroupeInterets()
  {
    $groupeInterets = $this->all('groupeInterets');
    return $groupeInterets;
  }

  public function getGroupeInteret($gnom)
  {
    $groupeInteret = $this->findOne('groupeInterets', array('nom' => $gnom));
    return $groupeInteret;
  }

}
 ?>
