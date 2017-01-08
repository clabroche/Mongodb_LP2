<?php
namespace App\Controller;
use App\ModelBuilder\Model;
/**
 *
 */
class CommentaireController extends Controller
{
  public function addCommentaire()
  {
    $interetCollection=new Model('pointInterets');
    $commentaireCollection = new Model('commentaires');
    $interet = $interetCollection->findOne(['nom'=>$_POST['nom']]);
    $insertCommentaire[] = array('commentaire' => $_POST['commentaire']);
    $commentaire= $commentaireCollection->insertOne($insertCommentaire);
    $commentaire = $commentaireCollection->findOne(['commentaire'=>$_POST['commentaire']]);
    $interetCollection->update(['nom' => $_POST["nom"]],['id_commentaire'=>$commentaire->_id]);
    return json_encode($commentaire);
  }

  public function getCommentaires()
  {
    $commentaireCollection = new Model('commentaires');
    $interetCollection = new Model('pointInterets');
    $interet = $interetCollection->findOne(['nom'=>$_GET['nom']]);
    foreach ($interet->id_commentaire as $key => $value) {
      $array[] = $commentaireCollection->findOne(['_id'=>$value]);
    }
    echo json_encode($array);
  }
}


 ?>
