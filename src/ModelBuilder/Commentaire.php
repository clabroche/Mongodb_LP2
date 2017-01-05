<?php
namespace App\ModelBuilder;
class Commentaire extends Model
{
  private $commentaires;
  function __construct()
  {
    $commentaires = $this->getCommentaires();
  }

  public function insertCommentaire($tab)
  {
    $commentaire = $this->insert('commentaires',$tab);
    return $this->getCommentaires();
  }

  public function getCommentaires()
  {
    $commentaires = $this->all('commentaires');
    return $commentaires;
  }

  public function getCommentaire($cnom)
  {
    $commentaire = $this->findOne('commentaires', array('nom' => $cnom));
    return $commentaire;
  }

}
 ?>
