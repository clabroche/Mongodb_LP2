<?php
namespace App\ModelBuilder;
class Model
{
  private $collection;
  function __construct($c)
  {
    $this->collection = $c;
  }

  public function all()
  {
    $nomCollection = $this->collection;
    $collection = (new \MongoDB\Client)->app->$nomCollection;
    return  $collection->find();
  }
  public function update($recherche, $update)
  {
    $nomCollection = $this->collection;
    $collection = (new \MongoDB\Client)->app->$nomCollection;
    $newCollection = $collection->findOneAndUpdate($recherche,['$push'=> $update]);
    return  $newCollection;
  }


  public function findOne($element)
  {
    $nomCollection = $this->collection;
    $collection = (new \MongoDB\Client)->app->$nomCollection;
    $departementsCollection = $collection->find($element);
    foreach ($departementsCollection as $key => $value) {
      return $value;
    }
  }

  public function insertOne($elements)
  {
    $nomCollection= $this->collection;
    $collection = (new \MongoDB\Client)->app->$nomCollection;
    $insertManyResult = null;
    foreach ($elements as $key => $value) {
      $insertManyResult = $collection->insertOne($value);
    }
    return "";
  }

  public function updateArrayId($tab, $id)
  {
    $found = false;
    foreach ($tab as $key => $id) {
      if ($id == $id) {
          $found = true;
          break;
      }
    }
    return $found;
  }
}


 ?>
