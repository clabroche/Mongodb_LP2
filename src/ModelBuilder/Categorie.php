<?php
namespace App\ModelBuilder;
class Categorie extends Model
{
  private $categories;
  function __construct()
  {
    $categories = $this->getCategories();
  }

  public function insertVille($tab)
  {
    $categorie = $this->insert('categories',$tab);
    return $this->getCategories();
  }

  public function getCategories()
  {
    $categories = $this->all('categories');
    return $categories;
  }

  public function getCategorie($cnom)
  {
    $categorie = $this->findOne('categories', array('nom' => $cnom));
    return $categorie;
  }

}
 ?>
